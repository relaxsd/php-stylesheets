<?php

use PHPUnit\Framework\TestCase;
use Relaxsd\Stylesheets\Style;

class StylesTest extends TestCase
{

    /**
     * The test subject
     *
     * @var \Relaxsd\Stylesheets\Style
     */
    protected $style;

    /**
     * A Stylesheet mock object
     *
     * @var \Relaxsd\Stylesheets\Stylesheet|PHPUnit_Framework_MockObject_MockObject
     */
    protected $stylesheetMock;

    protected function setUp()
    {
        parent::setUp();

        $this->stylesheetMock = $this->getMockBuilder('Relaxsd\Stylesheets\Stylesheet')->getMock();
        $this->style          = new Style();
    }

    /**
     * @test
     */
    public function it_can_be_constructed()
    {
        self::assertInstanceOf('Relaxsd\Stylesheets\Style', $this->style);
    }

    /**
     * @test
     */
    public function it_can_be_constructed_with_an_array()
    {
        $rules = [
            'attrib1' => 'value1',
            'attrib2' => 2,
        ];
        $style = new Style($rules);
        self::assertInstanceOf('Relaxsd\Stylesheets\Style', $style);
        self::assertEquals($rules, $style->getRules());
    }

    /**
     * @test
     */
    public function it_can_be_constructed_with_a_style()
    {
        $rules = [
            'attrib1' => 'value1',
            'attrib2' => 2,
        ];
        $style = new Style(new Style($rules));
        self::assertInstanceOf('Relaxsd\Stylesheets\Style', $style);
        self::assertEquals($rules, $style->getRules());
    }

    /**
     * @test
     */
    public function it_stores_and_retrieves_values()
    {
        $style = new Style(['attribute' => 'value']);

        $this->assertEquals('value', $style->getValue('attribute'));
        $this->assertEquals('value', $style->getValue('attribute', 'some_default'));
        $this->assertEquals('some_default', $style->getValue('nonexisting_attribute', 'some_default'));
    }

    /**
     * @test
     */
    public function it_overwrites_existing_values()
    {
        $this->style
            ->addRule('NAME', 'VALUE')
            ->addRule('NAME', 'NEW_VALUE');

        $this->assertEquals('NEW_VALUE', $this->style->getValue('NAME'));
    }

    /**
     * @test
     */
    public function it_returns_null_for_nonexistent_values()
    {
        $this->assertNull($this->style->getValue('(nonexistent)'));
    }

    /**
     * @test
     */
    public function it_returns_all_values()
    {
        $this->style
            ->addRule('NAME1', 'VALUE1')
            ->addRule('NAME2', 'VALUE2');

        $this->assertEquals([
            'NAME1' => 'VALUE1',
            'NAME2' => 'VALUE2',
        ], $this->style->getRules());

    }

    /**
     * @test
     */
    public function it_can_clone()
    {
        // Add a random style to out Styles
        $this->style->addRule('NAME', 'VALUE');

        // Clone the Styles object
        $copy = $this->style->copy();
        $this->assertNotSame($this->style, $copy);

        // Check that the copy has the same style 'Name' => 'VALUE'
        $this->assertEquals('VALUE', $copy->getValue('NAME'));
    }

    /**
     * @test
     */
    public function it_merges_styles()
    {
        $style1 = new Style([
            'NAME1' => 'VALUE1',
            'NAME2' => 'VALUE2',
        ]);

        $style2 = new Style([
            'NAME2' => 'NEW_VALUE2',
            'NAME3' => 'VALUE3',
        ]);

        $self = $style1->add($style2);

        $this->assertSame($style1, $self);

        $this->assertEquals([
            'NAME1' => 'VALUE1',
            'NAME2' => 'NEW_VALUE2',
            'NAME3' => 'VALUE3',
        ], $style1->getRules());

    }

    /**
     * @test
     */
    public function it_creates_a_merged_copy()
    {
        $rules1 = [
            'NAME1' => 'VALUE1',
            'NAME2' => 'VALUE2',
        ];

        $rules2 = [
            'NAME2' => 'NEW_VALUE2',
            'NAME3' => 'VALUE3',
        ];

        $style1 = new Style($rules1);
        $style2 = new Style($rules2);
        $merged = Style::merged($style1, $style2);

        $this->assertNotSame($style1, $merged);
        $this->assertNotSame($style2, $merged);

        $this->assertEquals([
            'NAME1' => 'VALUE1',
            'NAME2' => 'NEW_VALUE2',
            'NAME3' => 'VALUE3',
        ], $merged->getRules());

        $this->assertEquals($rules1, $style1->getRules());
        $this->assertEquals($rules2, $style2->getRules());

    }

    /**
     * @test
     */
    public function it_scales()
    {
        $this->style
            ->addRule('border-size', 10)
            ->addRule('some-number', 20)
            ->addRule('size', 3);

        $self = $this->style->scale(2.5);
        $this->assertSame($this->style, $self);

        $this->assertEquals([
            'border-size' => 25,
            'some-number' => 20, // unchanged
            'size'        => 7.5
        ], $this->style->getRules());

    }

    /**
     * @test
     */
    public function it_creates_a_scaled_copy()
    {
        $style = new Style([
            'border-size' => 10,
            'some-number' => 20,
            'size'        => 3,
        ]);

        $scaled = Style::scaled($style, 2.5);
        $this->assertNotSame($style, $scaled);

        $this->assertEquals([
            'border-size' => 25,
            'some-number' => 20, // unchanged
            'size'        => 7.5
        ], $scaled->getRules());

    }

    /**
     * @test
     */
    public function it_converts_an_array_to_style()
    {

        $arr   = ['border-size' => 25];
        $style = new Style($arr);

        // Convert array to style
        $fromArray = Style::style($arr);
        $this->assertEquals($style, $fromArray);
        $this->assertNotSame($style, $fromArray);

        // Just return the style instance
        $fromStyle = Style::style($style);
        $this->assertSame($style, $fromStyle);

        // Return a copy of the style
        $fromStyleCopy = Style::style($style, true);
        $this->assertNotSame($style, $fromStyleCopy);
        $this->assertEquals($style, $fromStyleCopy);

    }

}
