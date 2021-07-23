<div class="htmlToaddQuestion">
    <div class="col-12 col-md-12">
        <div class="form-group">
            <label for="question" class=" form-control-label">Question</label>
            <input type="hidden" name="data[{{ isset($count) ? @$count : 0 }}][id]" value="{{ @$question->id }}">
            <input type="text" name="data[{{ isset($count) ? @$count : 0 }}][question]" placeholder="Enter your Question" value="{{ @$question->question }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="option_1" class=" form-control-label">Option 1</label>
            <input type="text" name="data[{{ isset($count) ? @$count : 0 }}][option_1]" placeholder="Enter your Option 1" value="{{ @$question->option_1 }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="option_2" class=" form-control-label">Option 2</label>
            <input type="text" name="data[{{ isset($count) ? @$count : 0 }}][option_2]" placeholder="Enter your Option 2" value="{{ @$question->option_2 }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="option_3" class=" form-control-label">Option 3</label>
            <input type="text" name="data[{{ isset($count) ? @$count : 0 }}][option_3]" placeholder="Enter your Option 3" value="{{ @$question->option_3 }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="option_4" class=" form-control-label">Option 4</label>
            <input type="text" name="data[{{ isset($count) ? @$count : 0 }}][option_4]" placeholder="Enter your Option 4" value="{{ @$question->option_4 }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="answer" class=" form-control-label">Answer</label>
            <input type="text" name="data[{{ isset($count) ? @$count : 0 }}][answer]" placeholder="Enter your Answer" value="{{ @$question->answer }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="question_time" class=" form-control-label">Question Coming Time</label>
            <input type="number" min="0" name="data[{{ isset($count) ? @$count : 0 }}][question_time]" placeholder="Enter Question Coming Time" value="{{ @$question->question_time }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="time" class=" form-control-label">Question After Time</label>
            <input type="number" min="0" name="data[{{ isset($count) ? @$count : 0 }}][time]" placeholder="Enter your Question After Time" value="{{ @$question->time }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="marks" class=" form-control-label">Marks</label>
            <input type="number" name="data[{{ isset($count) ? @$count : 0 }}][marks]" placeholder="Enter your Marks" value="{{ @$question->marks }}" class="form-control">
        </div>

        @if(isset($question->id))
        <a href="{{ route('frontend.user.survey.deleteSection',['id'=>$question->id,'type'=>'question']) }}" class="btn btn btn-outline-danger"><i class="fa fa-trash-o"></i></a>
        @endif
    </div>
</div>
<hr>