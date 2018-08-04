<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 2018.07.16.
 * Time: 7:09
 */


use PhpGuide\Collection\Collection;


include 'fakers/fakers.php';


class CollectionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function collection_add_func_right_type_class()
    {
        $collection = new Collection(UserFaker::class);
        $user = new UserFaker;
        $collection->add($user);

        $this->assertEquals([$user], $collection->getAll());
        $this->assertFalse($collection->isEmpty());
    }

    /**
     * @test
     */
    public function collection_add_func_not_right_type_class()
    {
        $collection = new Collection(UserFaker::class);
        $email = new EmailFaker();
        $flag = false;
        try {
            $collection->add($email);
        } catch (InvalidArgumentException $exception) {
            $flag = true;
        }

        $this->assertTrue($flag);
        $this->assertTrue($collection->isEmpty());
        $this->assertEquals([], $collection->getAll());
    }

    /**
     * @test
     */
    public function is_empty_if_collection_empty_return_true()
    {
        $collection = new Collection(UserFaker::class);
        $actual = $collection->isEmpty();
        $this->assertEquals(true, $actual);
    }

    /**
     * @test
     */
    public function is_empty_if_collection_not_empty_return_false()
    {
        $user = new UserFaker();
        $collection = new Collection(UserFaker::class);
        $collection->add($user);
        $actual = $collection->isEmpty();
        $this->assertEquals(false, $actual);
    }

    /**
     * @test
     */
    public function right_return_result_count()
    {
        $collection = new Collection(UserFaker::class);
        for($i = 0; $i < 5; $i++) {
            $collection->add(new UserFaker());
        }

        $countable = $collection->count();
        $this->assertSame(5, $countable);

        $collection = new Collection(UserFaker::class);
        for($i = 0; $i < 3; $i++) {
            $collection->add(new UserFaker());
        }
        $countable = $collection->count();
        $this->assertSame(3, $countable);
    }

    /**
     * @test
     */
    public function get_last_element()
    {
        $collection = new Collection(UserFaker::class);

        $attila = new UserFaker();
        $attila->name = 'Attila';
        $janos = new UserFaker();
        $janos->name = 'Janos';
        $gabor = new UserFaker();
        $gabor->name = 'Gabor';

        $collection->add($attila);
        $collection->add($janos);
        $collection->add($gabor);

        $last = $collection->last();
        $this->assertSame($gabor, $last);
        $this->assertSame('Gabor', $last->name);
        $this->assertInstanceOf(UserFaker::class, $last);
    }

    /**
     * @test
     */
    public function get_first_element()
    {
        $collection = new Collection(UserFaker::class);

        $attila = new UserFaker();
        $attila->name = 'Attila';
        $janos = new UserFaker();
        $janos->name = 'Janos';
        $gabor = new UserFaker();
        $gabor->name = 'Gabor';

        $collection->add($attila);
        $collection->add($janos);
        $collection->add($gabor);

        $last = $collection->first();
        $this->assertSame($attila, $last);
        $this->assertSame('Attila', $last->name);
        $this->assertInstanceOf(UserFaker::class, $last);
    }

    /**
     * @test
     */
    public function get_all_element()
    {
        $collection = new Collection(UserFaker::class);

        $attila = new UserFaker();
        $attila->name = 'Attila';
        $janos = new UserFaker();
        $janos->name = 'Janos';
        $gabor = new UserFaker();
        $gabor->name = 'Gabor';

        $collection->add($attila);
        $collection->add($janos);
        $collection->add($gabor);

        $all = [$attila, $janos, $gabor];

        $collectionAll = $collection->getAll();
        $this->assertSame($all, $collectionAll);
    }

    /**
     * @test
     */
    public function isNext_if_current_equal_0_and_count_greater_null_result_true()
    {
        $collection = new Collection(UserFaker::class);
        $user = new UserFaker();
        $collection->add($user);

        $isNext = $collection->isNext();
        $this->assertSame(true, $isNext);
    }

    /**
     * @test
     */
    public function isNext_if_current_equal_0_and_count_equal_0_result_false()
    {
        $collection = new Collection(UserFaker::class);

        $isNext = $collection->isNext();
        $this->assertSame(false, $isNext);
    }

    /**
     * @test
     */
    public function get_next()
    {
        $collection = new Collection(UserFaker::class);
        $attila = new UserFaker();
        $attila->name = 'Attila';
        $janos = new UserFaker();
        $janos->name = 'Janos';
        $gabor = new UserFaker();
        $gabor->name = 'Gabor';

        $collection->add($attila);


        $next = $collection->getNext();
        $this->assertSame($attila, $next);
    }

    /**
     * @test
     */
    public function get_next_is_next_result_false()
    {
        $collection = new Collection(UserFaker::class);
        $attila = new UserFaker();
        $attila->name = 'Attila';
        $janos = new UserFaker();
        $janos->name = 'Janos';
        $gabor = new UserFaker();
        $gabor->name = 'Gabor';

        $collection->add($attila);


        $next = $collection->getNext();
        $isNext = $collection->isNext();
        $this->assertSame($attila, $next);
        $this->assertSame(false, $isNext);
    }

    /**
     * @test
     */
    public function reset()
    {
        $collection = new Collection(UserFaker::class);
        $attila = new UserFaker();
        $attila->name = 'Attila';
        $janos = new UserFaker();
        $janos->name = 'Janos';
        $gabor = new UserFaker();
        $gabor->name = 'Gabor';

        $collection->add($attila);
        $collection->add($janos);
        $collection->add($gabor);

        $isNext = $collection->getNext();
        $this->assertSame($attila, $isNext);
        $this->assertSame('Attila', $isNext->name);

        $isNext = $collection->getNext();
        $this->assertSame($janos, $isNext);
        $this->assertSame('Janos', $isNext->name);

        $collection->reset();
        $isNext = $collection->getNext();
        $this->assertSame($attila, $isNext);
        $this->assertSame('Attila', $isNext->name);
    }
}