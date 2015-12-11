<?php
use Santore\App;

class ScoreAppTest extends PHPUnit_Framework_TestCase 
{
    protected $teacher;
    
    public function setUp() {
        $this->teacher = new App;
    }
    
    public function dataSet()
    {
        return [
            // Correct Answers
            [[0], 2, 0, 1, 2],
            [[0, 0], 2, 0, 1, 4],
            [[0, 0], 3, 0, 1, 6],
            
            // Omitted Answers
            [[1], 2, 0, 1, 0],
            [[1, 1], 2, 0, 1, 0],
            [[1, 1], 2, 1, 1, 2],
            
            // Incorect Answers
            [[2], 2, 0, 1, -1],
            [[2, 2], 2, 0, 1, -2],
            [[2, 2], 2, 0, 2, -4],
            
            // Combination Answers
            [[0, 1, 2], 2, -1, 1, 0],
            
            [[0, 0, 0, 0, 2, 1, 0], 2, 0, 1, 9],
            [[0, 1, 0, 0, 2, 1, 0, 2, 2, 1], 3, -1, 2, 3],
        ];
    }

    /**
     * @dataProvider dataSet
    */
    public function testScoreTest($answers, $correct_points, $omitted_points, $incorrect_points, $expected) {
        $this->assertEquals($this->teacher->scoreTest($answers, $correct_points, $omitted_points, $incorrect_points), $expected);
    }
}