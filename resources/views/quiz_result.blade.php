<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} Sonucu</x-slot>

    @foreach ($quiz->questions as $question)

        <div class="card">
            <div class="card-body">

                <div class="row">
                    @if ($question->correct_answer == $question->my_answer->answer)
                        <div> Doğru </div>
                    @else
                        <div> Yanlış </div>
                    @endif
                    <strong class="col-md-0"> #{{ $loop->iteration }}</strong>
                    @if ($question->image)

                        <img class="card-img-top-4" src="{{ asset($question->image) }}" style="width: 25%;"
                            alt="Card image cap">


                    @endif
                </div>
                <h5 class="card-title">{{ $question->question }}</h5>
                <div class="form-check">
                    <span @if ($question->correct_answer == "answer1") class="text-success"
                       @elseif ("answer1"==$question->my_answer->answer) class="text-danger" @endif> {{ $question->answer1 }} </span>
                </div>
                <div class="form-check">
                    <span @if ($question->correct_answer == "answer2") class="text-success"
                       @elseif ("answer2"==$question->my_answer->answer) class="text-danger" @endif> {{ $question->answer2 }}
                    </span>
                </div>
                <div class="form-check">
                    <span @if ($question->correct_answer == "answer3") class="text-success"
                       @elseif ("answer3"==$question->my_answer->answer) class="text-danger" @endif> {{ $question->answer3 }}
                    </span>
                </div>
                <div class="form-check">
                    <span @if ($question->correct_answer == "answer4") class="text-success"
                       @elseif ("answer4"==$question->my_answer->answer) class="text-danger" @endif> {{ $question->answer4 }}
                    </span>
                </div>


            </div>
        </div>

    @endforeach






</x-app-layout>
