@extends('layouts.app')

@section('title', 'Category List')

@section('content')
    <!-- Categories List (Vertical Full Width) -->
    <div class="space-y-8 px-32 mt-28">
        @php
            $categories = [
                [
                    'id' => 1,
                    'nama_222290' => 'Facial Wash',
                    'deskripsi_222290' => 'Pembersih wajah untuk berbagai jenis kulit.',
                    'path_img_222290' =>
                        'https://images.unsplash.com/photo-1590322739578-fb3d9ff41465?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
                [
                    'id' => 2,
                    'nama_222290' => 'Toner',
                    'deskripsi_222290' => 'Toner untuk menyeimbangkan pH kulit.',
                    'path_img_222290' =>
                        'https://images.unsplash.com/photo-1715702449456-9b6b1c51665c?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
                [
                    'id' => 3,
                    'nama_222290' => 'Moisturizer',
                    'deskripsi_222290' => 'Pelembap untuk menjaga kelembapan kulit.',
                    'path_img_222290' =>
                        'https://plus.unsplash.com/premium_photo-1683133990522-4155deaacbbb?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
                [
                    'id' => 4,
                    'nama_222290' => 'Serum',
                    'deskripsi_222290' => 'Serum untuk perawatan kulit lebih intensif.',
                    'path_img_222290' =>
                        'https://plus.unsplash.com/premium_photo-1673480196182-0b4944bf8053?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
                [
                    'id' => 5,
                    'nama_222290' => 'Sunscreen',
                    'deskripsi_222290' => 'Tabir surya untuk melindungi kulit dari paparan sinar matahari.',
                    'path_img_222290' =>
                        'https://plus.unsplash.com/premium_photo-1692441602399-8b89fd59c21c?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
                [
                    'id' => 6,
                    'nama_222290' => 'Eye Cream',
                    'deskripsi_222290' => 'Krim mata untuk mengurangi kantung mata.',
                    'path_img_222290' => 'https://via.placeholder.com/150/8A2BE2/FFFFFF?text=Eye+Cream',
                ],
                [
                    'id' => 7,
                    'nama_222290' => 'Exfoliator',
                    'deskripsi_222290' => 'Eksfoliator untuk mengangkat sel kulit mati.',
                    'path_img_222290' => 'https://via.placeholder.com/150/00FFFF/FFFFFF?text=Exfoliator',
                ],
                [
                    'id' => 8,
                    'nama_222290' => 'Face Mask',
                    'deskripsi_222290' => 'Masker wajah untuk perawatan kulit ekstra.',
                    'path_img_222290' => 'https://via.placeholder.com/150/FF8C00/FFFFFF?text=Face+Mask',
                ],
            ];
        @endphp

        @foreach ($categories as $category)
            <!-- Dynamic Category Cards -->
            @include('components.categories.card_category', [
                'path' => route('categories.show', $category['id']),
                'title' => $category['nama_222290'],
                'desc' => $category['deskripsi_222290'],
                'image' => $category['path_img_222290'],
            ])
        @endforeach
    </div>
@endsection
