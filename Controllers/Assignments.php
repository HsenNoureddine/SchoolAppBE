<?php
class AssignmentsController extends Controller{

    public function __construct()
    {
        Parent::__construct("Assignments");
    }

    public function addAssignment($values)
    {
        $values = $this->sanitizeInputArray($values);
        $this->insert($values);
    }

    public function deleteAssignment($condition)
    {
        $this->delete($condition);
    }
}
?>