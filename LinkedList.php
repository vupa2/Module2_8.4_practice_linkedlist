<?php

require_once 'Node.php';

class LinkedList
{
    public $count;
    public $firstNode;
    public $lastNode;

    public function __construct()
    {
        $this->count = 0;
        $this->firstNode = null;
        $this->lastNode = null;
    }

    public function printList()
    {
        $arr = [];
        for ($current = $this->firstNode; $current != null; $current = $current->next) {
            array_push($arr, $current->readNode());
        }
        return $arr;
    }

    public function size()
    {
        return $this->count;
    }

    public function add($index, $data)
    {
        if ($index < 0 || $index > $this->count) {
            echo "Invalid index";
        } else if ($index == 0) {
            $this->addFirst($data);
        } else if ($index == $this->count) {
            $this->addLast($data);
        } else {
            $link = new Node($data);
            $current = $this->firstNode;

            for ($i = 0; $i < $index - 1; $i++) {
                $current = $current->next;
            }
            $link->next = $current->next;
            $current->next = $link;
            $this->count++;
        }
    }

    public function addFirst($data)
    {
        $link = new Node($data);
        $link->next = $this->firstNode;
        $this->firstNode = $link;

        if ($this->lastNode == null) {
            $this->lastNode = $link;
        }

        $this->count++;
    }

    public function addLast($data)
    {
        $link = new Node($data);
        $link->next = null;

        if ($this->count == 0) {
            $this->firstNode = $this->lastNode = $link;
        } else {
            $this->lastNode->next = $link;
            $this->lastNode = $link;
        }

        $this->count++;
    }

    public function removeAtIndex($index)
    {
        if ($index < 0 || $index >= $this->count) {
            echo 'Invalid Arguments';
        } else if ($index == 0) {
            $this->removeFirst();
        } else if ($index == $this->count - 1) {
            $this->removeLast();
        } else {
            $current = $this->firstNode;
            for ($i = 0; $i < $index - 1; $i++) {
                $current = $current->next;
            }
            $current->next = $current->next->next;
            $this->count--;
        }
    }

    public function removeOject($data)
    {
        $index = $this->indexOf($data);
        if (is_int($index)) {
            $this->removeAtIndex($index);
        }
    }

    public function removeFirst()
    {
        if ($this->count == 0) {
            echo "Empty Linked List";
        } else if ($this->count == 1) {
            $this->firstNode = $this->lastNode = null;
            $this->count = 0;
        } else {
            $this->firstNode = $this->firstNode->next;
            $this->count--;
        }
    }

    public function removeLast()
    {
        if ($this->size == 0) {
            echo "Empty Linked List";
        } else if ($this->count == 1) {
            $this->firstNode = $this->lastNode = null;
            $this->count = 0;
        } else {
            $current = $this->firstNode;
            for ($i = 0; $i < $this->count - 2; $i++) {
                $current = $current->next;
            }

            $this->lastNode = $current;
            $this->lastNode->next = null;
            $this->count--;
        }
    }

    public function get($index)
    {
        if ($this->count == 0) {
            echo "Empty Linked List";
        } else if ($index < 0 || $index >= $this->count) {
            echo "Invalid index";
        } else {
            $current = $this->firstNode;
            for ($i = 0; $i < $index; $i++) {
                $current = $current->next;
            }
            return $current->readNode();
        }
    }

    public function contains($data)
    {
        $this->indexOf($data);
    }

    public function indexOf($data)
    {
        if ($this->count == 0) {
            echo "Empty Linked List";
        } else {
            $index = 0;
            for ($current = $this->firstNode; $current != null; $current = $current->next) {
                if ($current->readNode() == $data) {
                    return $index;
                }
                $index++;
            }
            echo "Object Not Found";
        }
        return false;
    }

    public function clone()
    {
    }
}
