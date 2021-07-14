<x-app-layout>
    <x-slot name="header"> Quiz oluştur</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('quizzes.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Quiz Başlığı</label><br>
                    <input type="text" name="title" class="form-Control" value="{{old("title")}}">
                </div>
                <div class="form-group">
                    <label>Quiz Acıklama</label><br>
                    <textarea name="description" class="form-Control" rows="4" value="{{old("description")}}"></textarea>
                </div>
                <div class="form-group"><br>
                    <input type="checkbox" @if (old("finished_at")) checked  @endif  id="isFinished" class="form-Control">
                    <label>Bitiş Tarihi olacak mı?</label><br>
                </div>
                <div class="form-group"  id="finishedInput" @if (!old("finished_at"))  style="display: none" @endif><br>
                    <label>Bitiş Tarihi</label><br>
                    <input type="datetime-local" name="finished_at" class="form-Control" value="{{old("finished_at")}}">
                </div>
                <div class="form-group"><br>
                    <button type="submit" class="btn btn-succes btn-sm btn-block"> Quiz Oluştur </button>
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
