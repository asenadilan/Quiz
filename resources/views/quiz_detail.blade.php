<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>


    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            soru sayısı
                            <span class="badge bg-secondary rounded-pill">{{ $quiz->questions_count }}</span>
                        </li>
                        @if ($quiz->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                son katılım tarihi
                                <span
                                    class="badge bg-secondary rounded-pill">{{ $quiz->finished_at->diffForHumans() }}</span>
                            </li>
                        @endif

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Katılımcı sayısı
                            <span class="badge bg-secondary rounded-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ortalama puan
                            <span class="badge bg-secondary rounded-pill">60</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            A third list item
                            <span class="badge bg-secondary rounded-pill">1</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            soru sayısı
                            <span class="badge bg-secondary rounded-pill">{{ $quiz->questions_count }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">
                    {{ $quiz->description }}</p>
                    <a href="{{route("quiz_join",$quiz->slug)}}" class="btn btn-primary btn-block btn-sm">Quize katıl</a>

                </div>
            </div>
        </div>
</x-app-layout>
