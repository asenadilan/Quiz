<x-app-layout>
    <x-slot name="header"> {{$quiz->title}}için yeni soru oluştur</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route("questions.store",$quiz->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Soru </label><br>
                    <textarea name="question" class="form-Control" rows="4" >{{old("question")}}</textarea>
                </div>
                <div class="form-group">
                    <label>Fotoğraf</label><br>
                    <input type="file" name="image" class="form-Control" >
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>cevap1 </label><br>
                            <textarea name="answer1" class="form-Control" rows="4" >{{old("answer1")}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>cevap2 </label><br>
                            <textarea name="answer2" class="form-Control" rows="4" >{{old("answer2")}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>cevap3 </label><br>
                            <textarea name="answer3" class="form-Control" rows="4" >{{old("answer3")}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>cevap4 </label><br>
                            <textarea name="answer4" class="form-Control" rows="4" >{{old("answer4")}}</textarea>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="form-group"><br>
                    <select name="correct_answer" class="form-Control">
                        <option @if (old("correct_answer")=="answer1") selected @endif value="answer1">answer1</option>
                        <option @if (old("correct_answer")=="answer2") selected @endif value="answer2">answer2</option>
                        <option @if (old("correct_answer")=="answer3") selected @endif value="answer3">answer3</option>
                        <option @if (old("correct_answer")=="answer4") selected @endif value="answer4">answer4</option>
                    </select>

                </div>

                <div class="form-group"><br>
                    <button type="submit" class="btn btn-succes btn-sm btn-block"> Soru Oluştur </button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
