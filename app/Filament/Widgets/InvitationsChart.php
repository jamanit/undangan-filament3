<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\Auth;
use App\Models\Invitation;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class InvitationsChart extends ChartWidget
{
    protected static ?string $heading = 'Invitations in the Last 6 Months'; // Menentukan judul untuk widget chart

    protected int | string | array $columnSpan = 'full'; // Mengatur lebar chart agar menempati seluruh kolom (full)

    protected function getData(): array
    {
        // Mengambil jumlah per bulan dalam 6 bulan terakhir dengan format Y-m (tahun-bulan)
        $invitations = Invitation::select(DB::raw('strftime("%Y-%m", created_at) as month_year'), DB::raw('COUNT(*) as total'))
            ->where('created_at', '>=', now()->subMonths(6)) // Filter yang tercatat dalam 6 bulan terakhir
            ->where('user_id', Auth::id())
            ->groupBy('month_year') // Kelompokkan berdasarkan bulan-tahun
            ->orderBy('month_year') // Urutkan berdasarkan bulan-tahun
            ->get()
            ->keyBy('month_year') // Mengubah hasil menjadi key-value berdasarkan month_year
            ->toArray(); // Konversi hasil ke array

        // Mendapatkan daftar 6 bulan terakhir dari sekarang dengan format Y-m (tahun-bulan)
        $lastSixMonths = collect(range(0, 5))->map(function ($i) {
            return now()->subMonths($i)->format('Y-m'); // Mengambil tanggal 6 bulan kebelakang
        })->reverse()->values()->toArray(); // Balikkan urutan dari yang terbaru ke yang terlama

        // Menyusun data jumlah untuk tiap bulan dalam 6 bulan terakhir
        $data = [];
        foreach ($lastSixMonths as $month) {
            $data[] = intval($invitations[$month]['total'] ?? 0); // Ambil jumlah, jika tidak ada set ke 0
        }

        // Mengembalikan data untuk digunakan dalam chart
        return [
            'datasets' => [
                [
                    'label' => 'Total Invitations', // Label untuk dataset
                    'data' => $data, // Data yang sudah disusun
                ],
            ],
            'labels' => $lastSixMonths, // Label pada sumbu X berupa 6 bulan terakhir
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Jenis chart yang digunakan adalah line chart
    }

    protected function getOptions(): array
    {
        $maxInvitations = max($this->getData()['datasets'][0]['data']); // Mendapatkan jumlah maksimum

        // Tentukan stepSize yang sesuai berdasarkan jumlah maksimum
        if ($maxInvitations > 1000) {
            $stepSize = 1000;
        } elseif ($maxInvitations > 500) {
            $stepSize = 500;
        } elseif ($maxInvitations > 100) {
            $stepSize = 100;
        } elseif ($maxInvitations > 50) {
            $stepSize = 50;
        } elseif ($maxInvitations > 10) {
            $stepSize = 10;
        } else {
            $stepSize = 1; // Untuk jumlah kecil
        }

        return [
            'scales' => [
                'y' => [
                    'ticks' => [
                        'beginAtZero' => true, // Skala pada sumbu Y dimulai dari 0
                        'stepSize' => $stepSize, // Skala meningkat sesuai dengan stepSize yang sudah diatur
                        'precision' => 0, // Tidak menampilkan angka desimal
                    ],
                ],
            ],
        ];
    }
}
