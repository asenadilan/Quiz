<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>
    <form action="#" method="POST">
        @csrf
        @foreach ($quiz->questions as $question)
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <strong class="col-md-0"> #{{ $loop->iteration }}</strong>
                        @if ($question->image)

                            <img class="card-img-top-4" src="{{ asset($question->image) }}" style="width: 25%;"
                                alt="Card image cap">


                        @endif
                    </div>
                    <h5 class="card-title">{{ $question->question }}</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}1" value="answer1" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}1">
                            {{ $question->answer1 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}2" value="answer1" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}2">
                            {{ $question->answer2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}3" value="answer1" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}3">
                            {{ $question->answer3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}4" value="answer1" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}4">
                            {{ $question->answer4 }}
                        </label>
                    </div>


                </div>
            </div>

        @endforeach

        <button type="submit" class="btn btn-success btn-sm btn-block">Sınavı Bitir</button>


    </form>

</x-app-layout>
