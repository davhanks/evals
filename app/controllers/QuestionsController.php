<?php

class QuestionsController extends BaseController {

	public function __construct() {

	}

	public function get_question_new($testID) {
		return View::make('questions.new')
		->with('title', 'New Question')
		->with('testID', $testID);
	}

	public function post_question_create() {

		$v = Validator::make(Input::all(), Question::$rules);

		if($v->fails()) {
			return Redirect::to('questions/' . Input::get('testID') . '/new')->withErrors($v)->withInput();
		} else {

			$test = Test::find(Input::get('testID'));

			$question = new Question;
			$question->text = e(Input::get('text'));
			$question->point_value = e(Input::get('point_value'));
			$question->question_number = $test->number_of_questions + 1;
			$question->is_active = '1';
			$question->test_id = Input::get('testID');
			$question->save();

			
			$total_points = $test->total_points;
			$total_points += Input::get('point_value');
			$test->total_points = $total_points;

			$test->number_of_questions += 1;
			$test->save();

			return Redirect::to('tests/' . Input::get('testID') . '/view');
		}
		
	}

	public function get_question_view($id) {
		return View::make('questions.view')
			->with('title', 'View Question')
			->with('question', Question::find($id))
			->with('answers', Answer::where('question_id', '=', $id)->get());
	}

	public function post_switch_active() {

		if(Request::AJAX()){
			$questionID = $_POST['questionID'];
			$question = Question::find($questionID);
			if($question->is_active()) {
				$question->is_active = '0';
				$question->save();
				return $question->id . ' is now Inactive';
			} else {
				$question->is_active = '1';
				$question->save();
				return $question->id . ' is now Active';
			}
		}
	}

	public function post_edit_question() {

		if(Request::AJAX()) {

			$v = Validator::make(Input::all(), Question::$rules);

			if($v->fails()) {
				return Response::json(array(
					'success'=>false,
					'errors'=>$v-getMessageBag()->toArray()
					), 200);
			} else {

				$question = Question::find(Input::get('questionID'));
				$question->text = e(Input::get('text'));
				$question->point_value = e(Input::get('point_value'));
				$question->save();

				return Response::json(array(
					'success'=>true,
					'text'=>$question->text,
					'point_value'=>$question->point_value,
					), 200);
			}
		}
	}

}