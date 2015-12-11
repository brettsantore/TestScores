<?php
namespace Santore;

class App
{
    const CORRECT_ANSWER = 0;
    const OMITTED_ANSWER = 1;
    const INCORRECT_ANSWER = 2;
    
    /**
     * Holds the number of each answer
     *
     * @var array
     */
    private $answers = [
        self::CORRECT_ANSWER   => 0,
        self::OMITTED_ANSWER   => 0,
        self::INCORRECT_ANSWER => 0,
    ];
    
    /**
     * Return the Test Score
     *
     * @param array $answer
     * @param int $correct_points
     * @param int $omitted_points
     * @param int $incorrect_points
     * @return int
     * @author Brett Santore
     */
    public function scoreTest($answers, $correct_points, $omitted_points, $incorrect_points)
    {
        foreach ($answers as $answer) {
            $this->addAnswer($answer);
        }
        
        return $this->score($correct_points, $omitted_points, $incorrect_points);
    }
    
    /**
     * Calculate the test score with the given point structure
     *
     * @param int $correct_points
     * @param int $omitted_points
     * @param int $incorrect_points
     * @return int
     * @author Brett Santore
     */
    private function score($correct_points, $omitted_points, $incorrect_points)
    {
        return ($this->numCorrectAnswers() * $correct_points)
                + ($this->numOmittedAnswers() * $omitted_points)
                - ($this->numIncorrectAnswers() * $incorrect_points);
    }
    
    /**
     * Add an answer to the answers array
     *
     * @param ind $answer
     * @return void
     * @author Brett Santore
     */
    private function addAnswer($answer)
    {
        switch ($answer) {
            case self::CORRECT_ANSWER:
                $this->answers[self::CORRECT_ANSWER]++;
                break;
            case self::OMITTED_ANSWER:
                $this->answers[self::OMITTED_ANSWER]++;
                break;
            case self::INCORRECT_ANSWER:
                $this->answers[self::INCORRECT_ANSWER]++;
                break;
            default:
                throw new \InvalidArgumentException("Unknown Answer Type: {$answer}");
                break;
        }
    }
    /**
     * Get the amount of Correct Answers from the test
     *
     * @return int
     * @author Brett Santore
     */
    private function numCorrectAnswers()
    {
        return $this->answers[self::CORRECT_ANSWER];
    }
    
    /**
     * Get the amount of Omitted Answers from the test
     *
     * @return int
     * @author Brett Santore
     */
    private function numOmittedAnswers()
    {
        return $this->answers[self::OMITTED_ANSWER];
    }
    
    /**
     * Get the amount of Incorrect Answers from the test
     *
     * @return int
     * @author Brett Santore
     */
    private function numIncorrectAnswers()
    {
        return $this->answers[self::INCORRECT_ANSWER];
    }
}
