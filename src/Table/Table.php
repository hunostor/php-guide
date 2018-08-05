<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 2018.08.04.
 * Time: 19:03
 */

namespace PhpGuide\Table;


class Table implements TableInterface
{
    protected $header = [];

    protected $countColumn;
    protected $countRow;

    protected $body = [];

    protected $tableClasses = '';
    
    protected $html = '';

    /**
     * set header
     * @param array $header
     */
    public function setHeader(array $header): void
    {
        $this->header = $header;
        $this->countColumn = $this->setCount($header);
    }

    /**
     * return header count = table column count
     * @param array $countable
     * @return int
     */
    private function setCount(array $countable): int
    {
        return count($countable);
    }

    /**
     * return columns count
     * @return int
     */
    public function countColumn(): int
    {
        return $this->countColumn;
    }

    /**
     * set table body
     * @param array $tableBody
     */
    public function setBody(array $tableBody): void
    {
        $this->body = $tableBody;
        $this->countRow = $this->setCount($tableBody);
    }

    /**
     * return table rows count
     * @return int
     */
    public function countRow(): int
    {
        return $this->countRow;
    }

    /**
     * return table json format
     * @return string
     */
    public function renderJSON(): string
    {
        $json = [];
        if(count($this->header) > 0) {
            $json["header"] = $this->header;
        }

        if(count($this->body) > 0) {
            $json["body"] = $this->body;
        }

        return json_encode($json);
    }

    /**
     * return table html format
     * @return string
     */
    public function renderHTML(): string
    {
        $this->html = '<table class="'.$this->tableClasses.'">' . PHP_EOL;
        if(count($this->header) > 0) {
            $this->html .= '<thead>' . PHP_EOL;
            $this->html .= '<tr>' . PHP_EOL;
            foreach ($this->header as $column) {
                $this->html .= '<th scope="col">' . $column . '</th>' . PHP_EOL;
            }
            $this->html .= '</tr>' . PHP_EOL;
            $this->html .= '</thead>' . PHP_EOL;
        }

        if(count($this->body) > 0) {
            $this->html .= '<tbody>' . PHP_EOL;
            foreach ($this->body as $row) {
                $this->html .= '<tr>' . PHP_EOL;
                $this->html .= '<th scope="row">' . $row[0] . '</th>' . PHP_EOL;
                for($i = 1; $i < count($row); $i++) {
                    $this->html .= '<td>' . $row[$i] . '</td>' . PHP_EOL;
                }
                $this->html .= '</tr>' . PHP_EOL;
            }

            $this->html .= '</tbody>' . PHP_EOL;
        }

        $this->html .= '</table>';

        return $this->html;
    }
}