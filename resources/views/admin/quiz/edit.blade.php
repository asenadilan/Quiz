<x-app-layout>
    <x-slot name="header"> Quiz Güncelle    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('quizzes.update',$quiz->id) }}" method="Post">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label>Quiz Başlığı</label><br>
                    <input type="text" name="title" class="form-Control" value="{{$quiz->title}}" >
                </div>
                <div class="form-group">
                    <label>Quiz Acıklama</label><br>
                    <textarea name="description" class="form-Control" rows="4" >{{$quiz->description}}</textarea>
                </div>
                <div class="form-group">
                    <label>Quiz Durumu</label><br>
                    <select name="status" class="form-Control" >
                        <option @if ($quiz->status =="draft")   selected @endif value="draft">Taslak</option>
                        <option @if ($quiz->status =="passive") selected @endif value="passive" >Pasif</option>
                        <option @if ($quiz->questions_count <4) disabled @endif @if ($quiz->status =="publish") selected @endif value="active">Aktif</option>
                    </select>
                </div>
                <div class="form-group"><br>
                    <input type="checkbox" @if ($quiz->finished_at) checked  @endif  id="isFinished" class="form-Control">
                    <label>Bitiş Tarihi olacak mı?</label><br>
                </div>
                <div class="form-group"  id="finishedInput" @if (!$quiz->finished_at)  style="display: none" @endif><br>
                    <label>Bitiş Tarihi</label><br>
                    <input type="datetime-local" name="finished_at" class="form-Control" @if ($quiz->finished_at)
                    value="{{date("Y-m-d\TH:i",strtotime($quiz->finished_at))}}"
                    @endif >
                </div>
                <div class="form-group"><br>
                    <button type="submit" class="btn btn-succes btn-sm btn-block"> Güncelle </button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $("#isFinished").change(function() {
                if ($("#isFinished").is(":checked")) {
                    $("#finishedInput").show();
                } else {
                    $("#finishedInput").hide();
                }

            })
        </script>
    </x-slot>
</x-app-layout>
