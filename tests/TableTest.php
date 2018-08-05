<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 2018.08.05.
 * Time: 10:12
 */

use PhpGuide\Table\Table;

class TableTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function table_header_count_column()
    {
        $table = new Table();
        $header = ["id", "price", "description", "state"];
        $table->setHeader($header);

        $this->assertSame(4, $table->countColumn());
    }

    /**
     * @test
     */
    public function table_count_row()
    {
        $table = new Table();
        $header = ["id", "price", "description"];
        $table->setHeader($header);
        $body = [
            [1, 34, 'description 1'],
            [2, 3346, 'description 2'],
            [3, 4543, 'description 3'],
        ];
        $table->setBody($body);

        $this->assertSame(3, $table->countRow());

        $table->setBody($body);
        $this->assertSame(3, $table->countRow());
    }

    /**
     * @test
     */
    public function table_render_json()
    {
        $table = new Table();
        $table->setHeader([ "price", "description"]);
        $body = [
            [34, 'description 1'],
            [3346, 'description 2'],
            [4543, 'description 3'],
        ];
        $table->setBody($body);
        $json = file_get_contents('./tests/json/table.json');

        $this->assertSame($json, $table->renderJSON());
    }

    /**
     * @test
     */
    public function table_render_json_no_header()
    {
        $table = new Table();

        $body = [
            [34, 'description 1'],
            [3346, 'description 2'],
            [4543, 'description 3'],
        ];
        $table->setBody($body);
        $json = file_get_contents('./tests/json/tableNoHeader.json');

        $this->assertSame($json, $table->renderJSON());
    }

    /**
     * @test
     */
    public function table_render_json_only_header()
    {
        $table = new Table();
        $table->setHeader([ "price", "description"]);

        $json = file_get_contents('./tests/json/tableOnlyHeader.json');

        $this->assertSame($json, $table->renderJSON());
    }

    /**
     * @test
     */
    public function table_render_html()
    {
        $table = new Table();
        $table->setHeader([ "price", "description"]);
        $body = [
            [34, 'description 1'],
            [3346, 'description 2'],
            [4543, 'description 3'],
        ];
        $table->setBody($body);
        $html = file_get_contents('./tests/html/table.html');

        $this->assertSame($html, $table->renderHTML());
    }

    /**
     * @test
     */
    public function table_render_html_two_row()
    {
        $table = new Table();
        $table->setHeader([ "price", "description"]);
        $body = [
            [34, 'description 1'],
            [3346, 'description 2'],
        ];
        $table->setBody($body);
        $html = file_get_contents('./tests/html/tableTwo.html');

        $this->assertSame($html, $table->renderHTML());
    }

    /**
     * @test
     */
    public function table_render_html_empty_head()
    {
        $table = new Table();
        $body = [
            [34, 'description 1'],
            [3346, 'description 2'],
            [4543, 'description 3'],
        ];
        $table->setBody($body);
        $html = file_get_contents('./tests/html/tableNoHead.html');

        $this->assertSame($html, $table->renderHTML());
    }

}