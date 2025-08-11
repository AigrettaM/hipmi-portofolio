@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="position-relative">
        <img src="{{ asset('images/yellow-fluid.png') }}" alt="" style="width: 340px">
        <div class="position-absolute bottom-0 start-50 translate-middle">
            <h1 class="hipmi-text text-center fs-1">Article</h1>
            <h6 class="text-warning fw-bold text-center">Read & Learn</h6>
        </div>
    </div>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <article class="article-content">
                        @if($article->thumbnail)
                            <div class="article-image mb-4">
                                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="img-fluid rounded" style="width: 100%; max-height: 400px; object-fit: cover;">
                            </div>
                        @endif
                        
                        <header class="article-header mb-4">
                            <h1 class="article-title text-primary mb-3">{{ $article->title }}</h1>
                            <div class="article-meta text-muted">
                                <small>
                                    <i class="fas fa-calendar-alt me-2"></i>
                                    {{ $article->created_at ? $article->created_at->format('d M Y') : 'No date' }}
                                </small>
                            </div>
                        </header>
                        
                        <div class="article-body">
                            {!! nl2br(e($article->content)) !!}
                        </div>
                        
                        <div class="article-footer mt-5 pt-4 border-top">
                            <a href="{{ route('home') }}" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left me-2"></i>
                                Kembali ke Beranda
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    .article-content {
        line-height: 1.8;
        font-size: 16px;
    }
    
    .article-title {
        font-size: 2.5rem;
        font-weight: 700;
        line-height: 1.2;
    }
    
    .article-body {
        font-size: 16px;
        line-height: 1.8;
        color: #333;
    }
    
    .article-body p {
        margin-bottom: 1.5rem;
    }
    
    .article-meta {
        font-size: 14px;
    }
    
    .article-image img {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    @media (max-width: 768px) {
        .article-title {
            font-size: 2rem;
        }
        
        .article-content {
            font-size: 15px;
        }
    }
</style>
@endsection

