<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>


    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($quiz->result)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sıralama
                                <span class="badge bg-success rounded-pill">{{ $quiz->my_rank }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Puan
                                <span class="badge bg-success rounded-pill">{{ $quiz->result->point }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                doğru /yanlış sayısı
                                <span
                                    class="badge bg-warning rounded-pill">{{ $quiz->result->correct . ' / ' . $quiz->result->wrong }}</span>
                            </li>
                        @endif


                        @if ($quiz->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                son katılım tarihi
                                <span
                                    class="badge bg-secondary rounded-pill">{{ $quiz->finished_at->diffForHumans() }}</span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            soru sayısı
                            <span class="badge bg-secondary rounded-pill">{{ $quiz->questions_count }}</span>
                        </li>
                        @if ($quiz->details)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Katılımcı sayısı
                                <span
                                    class="badge bg-secondary rounded-pill">{{ $quiz->details['join_count'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Ortalama puan
                                <span class="badge bg-secondary rounded-pill">{{ $quiz->details['average'] }}</span>
                            </li>
                        @endif
                    </ul>

                    @if (count($quiz->topTen) > 0)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="title">
                                    ilk 10
                                </h5>
                                <ul class="list-group">
                                    @foreach ($quiz->topTen as $result)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong class="h3">{{ $loop->iteration }}.</strong>
                                            <img src="{{ $result->user->profile_photo_url }}" alt="">
                                            <span @if (auth()->user()->id == $result->user_id)class="text-danger" @endif>{{ $result->user->name }}
                                            </span>
                                            <span class="badge bg-secondary rounded-pill">{{ $result->point }}</span>
                                        </li> @endforeach </ul>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="col-md-8">
                    {{ $quiz->description }}</p>
                    @if ($quiz->result)
                        <a href="{{ route('quiz_join', $quiz->slug) }}"
                            class="btn btn-success btn-block btn-sm">Sonuçları incele </a>
                    @else
                        <a href="{{ route('quiz_join', $quiz->slug) }}"
                            class="btn btn-primary btn-block btn-sm">Quize
                            katıl</a>
                    @endif


                </div>
            </div>
        </div>
</x-app-layout>
