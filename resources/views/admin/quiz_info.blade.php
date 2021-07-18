<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>


    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">



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
                                            <span @if (auth()->user()->id == $result->user_id) class="text-danger" @endif>{{ $result->user->name }}
                                            </span>
                                            <span class="badge bg-secondary rounded-pill">{{ $result->point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="col-md-8">
                    {{ $quiz->description }}
                  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Ad soyad</th>
      <th scope="col">Puan</th>
      <th scope="col">Doğru/yanlış</th>

    </tr>
  </thead>
  <tbody>
      @foreach ($quiz->results as $result)
            <tr>

      <td>{{$result->user->name}}</td>
      <td>{{$result->point}}</td>
      <td>{{$result->correct." / ".$result->wrong}}</td>
    </tr>
      @endforeach


  </tbody>
</table>
                </div>
            </div>
        </div>
</x-app-layout>
