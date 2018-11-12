<?php

use Relaxsd\Stylesheets\Style;
use Relaxsd\Stylesheets\Stylesheet;
use PHPUnit\Framework\TestCase;

class StylesheetTest extends TestCase
{

    /**
     * The test subject
     *
     * @var \Relaxsd\Stylesheets\Stylesheet
     */
    protected $stylesheet;

    protected function setUp()
    {
        parent::setUp();

        $this->stylesheet = new Stylesheet();
    }

    /**
     * @test
     */
    public function it_adds_a_style()
    {
        // Create a style that belongs to some other stylesheet
        $newStyles = new Style();

        $self = $this->stylesheet->addStyle('p', $newStyles);
        $this->assertSame($this->stylesheet, $self);

        $storedStyles = $this->stylesheet->getStyle('p');
        $this->assertSame($newStyles, $storedStyles);
        $this->assertEquals($newStyles, $storedStyles);
    }

    /**
     * @test
     */
    public function it_appends_to_existing_styles()
    {
        $newStyles1 = (new Style())->addRule('border-size', 10);
        $newStyles2 = (new Style())->addRule('font-size', 5);

        $this->stylesheet
            ->addStyle('p', $newStyles1)
            ->addStyle('p', $newStyles2);

        $this->assertEquals(['p'], $this->stylesheet->getElements());

        $storedStyles = $this->stylesheet->getStyle('p');
        $this->assertEquals(10, $storedStyles->getValue('border-size'));
        $this->assertEquals(5, $storedStyles->getValue('font-size'));
    }

    /**
     * @test
     */
    public function it_adds_and_appends_single_styles()
    {
        $self = $this->stylesheet->addStyle('ELEMENT', ['NAME1' => 'VALUE1']);

        $this->assertEquals(['ELEMENT'], $this->stylesheet->getElements());

        $style = $this->stylesheet->getStyle('ELEMENT');
        $this->assertEquals('VALUE1', $style->getValue('NAME1'));
        $this->assertSame($this->stylesheet, $self);

        $self = $this->stylesheet->addStyle('ELEMENT', ['NAME2' => 'VALUE2']);

        $this->assertEquals(['ELEMENT'], $this->stylesheet->getElements());

        $style = $this->stylesheet->getStyle('ELEMENT');
        $this->assertEquals('VALUE1', $style->getValue('NAME1'));
        $this->assertEquals('VALUE2', $style->getValue('NAME2'));
        $this->assertSame($this->stylesheet, $self);
    }

    /**
     * @test
     */
    public function it_returns_null_if_styles_do_not_exist()
    {
        $this->assertNull($this->stylesheet->getStyle('(nonexistent)'));
    }

    /**
     * @test
     */
    public function it_merges_other_stylesheets()
    {
        $stylesheet2 = (new Stylesheet())->addStyle('p', ['background-color' => 'yellow']);
        $stylesheet3 = (new Stylesheet())->addStyle('p', ['font-size' => 10]);

        $self = $this->stylesheet->add($stylesheet2, $stylesheet3);
        $this->assertSame($this->stylesheet, $self);

        $this->assertEquals(['p'], $this->stylesheet->getElements());

        $styles = $this->stylesheet->getStyle('p');
        $this->assertEquals('yellow', $styles->getValue('background-color'));
        $this->assertEquals(10, $styles->getValue('font-size'));
    }

    /**
     * @test
     */
    public function it_can_clone()
    {
        $stylesheet = new Stylesheet([
            'element' => new Style([
                'NAME1' => 'VALUE1',
                'NAME2' => 'VALUE2',
            ])
        ]);

        $style = $stylesheet->getStyle('element');

        // Clone the Stylesheet object
        $stylesheetCopy = $stylesheet->copy();
        $styleCopy      = $stylesheetCopy->getStyle('element');

        $this->assertNotSame($stylesheet, $stylesheetCopy);
        $this->assertNotSame($style, $styleCopy);
        $this->assertEquals($stylesheet, $stylesheetCopy);
        $this->assertEquals($style, $styleCopy);
    }

    /**
     * @test
     */
    public function it_merges_stylesheets()
    {
        $stylesheet1 = new Stylesheet([
            'element' => new Style([
                'NAME1' => 'VALUE1',
                'NAME2' => 'VALUE2',
            ])
        ]);
        $stylesheet2 = new Stylesheet([
            'element' => new Style([
                'NAME2' => 'NEW_VALUE2',
                'NAME3' => 'VALUE3',
            ])
        ]);

        $style1 = $stylesheet1->getStyle('element');
        $style2 = $stylesheet2->getStyle('element');

        $self = $stylesheet1->add($stylesheet2);

        $this->assertSame($stylesheet1, $self);
        $this->assertSame($stylesheet1->getStyle('element'), $style1);
        $this->assertSame($stylesheet2->getStyle('element'), $style2);

        // Style1 (in stylesheet 1) should be modified
        $this->assertEquals([
            'element' => new Style([
                'NAME1' => 'VALUE1',
                'NAME2' => 'NEW_VALUE2',
                'NAME3' => 'VALUE3',
            ])
        ], $stylesheet1->getStyles());

    }

    /**
     * @test
     */
    public function it_creates_a_merged_copy()
    {
        $stylesheet1 = new Stylesheet([
            'element' => new Style([
                'NAME1' => 'VALUE1',
                'NAME2' => 'VALUE2',
            ])
        ]);
        $stylesheet2 = new Stylesheet([
            'element' => new Style([
                'NAME2' => 'NEW_VALUE2',
                'NAME3' => 'VALUE3',
            ])
        ]);

        $style1 = $stylesheet1->getStyle('element');
        $style2 = $stylesheet2->getStyle('element');

        $mergedStylesheet = Stylesheet::merged($stylesheet1, $stylesheet2);

        $this->assertNotSame($stylesheet1, $mergedStylesheet);
        $this->assertNotSame($stylesheet2, $mergedStylesheet);

        $this->assertSame($style1, $stylesheet1->getStyle('element'));
        $this->assertSame($style2, $stylesheet2->getStyle('element'));

        $this->assertEquals([
            'NAME1' => 'VALUE1',
            'NAME2' => 'NEW_VALUE2',
            'NAME3' => 'VALUE3',
        ], $mergedStylesheet->getStyle('element')->getRules());

    }

    /**
     * @test
     */
    public function it_scales()
    {

        $stylesheet = new Stylesheet([
            'element' => [
                'border-size' => 10,
                'some-number' => 20,
                'size'        => 3,
            ]
        ]);

        $style = $stylesheet->getStyle('element');

        $self = $stylesheet->scale(2.5);
        $this->assertSame($stylesheet, $self);
        $this->assertSame($style, $stylesheet->getStyle('element'));

        $this->assertEquals([
            'border-size' => 25,
            'some-number' => 20, // unchanged
            'size'        => 7.5
        ], $style->getRules());

    }

    /**
     * @test
     */
    public function it_creates_a_scaled_copy()
    {
        $stylesheet = new Stylesheet([
            'element' => [
                'border-size' => 10,
                'some-number' => 20,
                'size'        => 3,
            ]
        ]);

        $style = $stylesheet->getStyle('element');

        $scaledStylesheet = Stylesheet::scaled($stylesheet, 2.5);
        $this->assertNotSame($stylesheet, $scaledStylesheet);
        $this->assertNotSame($style, $scaledStylesheet->getStyle('element'));

        $this->assertEquals([
            'border-size' => 25,
            'some-number' => 20, // unchanged
            'size'        => 7.5
        ], $scaledStylesheet->getStyle('element')->getRules());

    }

}
