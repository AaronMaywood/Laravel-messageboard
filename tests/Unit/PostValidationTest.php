<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;

class PostValidationTest extends TestCase
{

    /**
     * @dataProvider rulesInputDataProvider
     */ 
    public function testRules($key, $input, bool $expect)
    {
        $request = new RegisterRequest();
        $request->setMethod('POST');
        $rules = $request->rules();

        $validator = Validator::make($input,[$key=>$rules[$key]]);
        $result = $validator->passes();
        $this->assertEquals($expect,$result);
    }

    public static function rulesInputDataProvider()
    {
        return [
            'name|通常_OK' => ['name',['name'=>'あいうABCabc12_-'], true],
            'name|2文字未満NG' => ['name',['name'=>'あ'], false],
            'name|2文字以上OK' => ['name',['name'=>'あい'], true],
            'name|必須NG' => ['name',['name'=>''], false],
        ];
    }
}
