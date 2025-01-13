@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mx-auto mt-8 p-4">
        <h1 class="text-2xl font-bold mb-4 text-center">Hasil Perhitungan</h1>
        <div class="space-y-2 text-center">
            <h2 class="text-lg font-medium">Kontral Kuliah</h2>
            <h3 class="text-md">Kehadiran = 20%</h3>
            <h3 class="text-md">Tugas = 30%</h3>
            <h3 class="text-md font-semibold">Project:</h3>
            <div class="text-sm">
                <p>- Respon1 = 5%</p>
                <p>- Respon2 = 5%</p>
                <p>- Respon3 = 10%</p>
                <p>- Respon4 = 15%</p>
                <p>- Respon5 = 15%</p>
            </div>
        </div>

        <table class="w-full border border-gray-300 mt-6 text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Hadir</th>
                    <th class="px-4 py-2 border">Tugas</th>
                    <th class="px-4 py-2 border">Project</th>
                    <th class="px-4 py-2 border">Total</th>
                    <th class="px-4 py-2 border">Huruf</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($input as $data)
                    <tr>
                        <td class="px-4 py-2 border">{{ $data->kehadiran }}</td>
                        <td class="px-4 py-2 border">{{ $data->tugas }}</td>
                        <td class="px-4 py-2 border">{{ $data->project }}</td>
                        <td class="px-4 py-2 border">{{ $data->total }}</td>
                        <td class="px-4 py-2 border">{{ $data->huruf }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
