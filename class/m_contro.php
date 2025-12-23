<?php
class m_contro extends m_class {
    private $cat_id;

    public function __construct($cat_id = null) {
        $this->cat_id = $cat_id;
    }

    public function getmanage() {
        if ($this->empty()) {
            return $this->manage($this->cat_id);
        } else {
            throw new Exception("Category ID is empty.");
        }
    }

    private function empty() {
        return !empty($this->cat_id);
    }
}
?>
