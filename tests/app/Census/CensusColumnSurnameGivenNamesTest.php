<?php
/**
 * webtrees: online genealogy
 * Copyright (C) 2018 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
declare(strict_types=1);

namespace Fisharebest\Webtrees\Census;

use Mockery;

/**
 * Test harness for the class CensusColumnSurnameGivenNames
 */
class CensusColumnSurnameGivenNamesTest extends \Fisharebest\Webtrees\TestCase
{
    /**
     * Delete mock objects
     *
     * @return void
     */
    public function tearDown()
    {
        Mockery::close();
    }

    /**
     * @covers \Fisharebest\Webtrees\Census\CensusColumnSurnameGivenNames
     * @covers \Fisharebest\Webtrees\Census\AbstractCensusColumn
     *
     * @return void
     */
    public function testOneGivenName()
    {
        $individual = Mockery::mock('Fisharebest\Webtrees\Individual');
        $individual->shouldReceive('getAllNames')->andReturn([
            [
                'givn' => 'Joe',
                'surname' => 'Sixpack',
            ],
        ]);
        $individual->shouldReceive('getSpouseFamilies')->andReturn([]);

        $census = Mockery::mock('Fisharebest\Webtrees\Census\CensusInterface');
        $census->shouldReceive('censusDate')->andReturn('');

        $column = new CensusColumnSurnameGivenNames($census, '', '');

        $this->assertSame('Sixpack, Joe', $column->generate($individual, $individual));
    }

    /**
     * @covers \Fisharebest\Webtrees\Census\CensusColumnSurnameGivenNames
     * @covers \Fisharebest\Webtrees\Census\AbstractCensusColumn
     *
     * @return void
     */
    public function testMultipleGivenNames()
    {
        $individual = Mockery::mock('Fisharebest\Webtrees\Individual');
        $individual->shouldReceive('getAllNames')->andReturn([
            [
                'givn' => 'Joe Fred',
                'surname' => 'Sixpack',
            ],
        ]);
        $individual->shouldReceive('getSpouseFamilies')->andReturn([]);

        $census = Mockery::mock('Fisharebest\Webtrees\Census\CensusInterface');
        $census->shouldReceive('censusDate')->andReturn('');

        $column = new CensusColumnSurnameGivenNames($census, '', '');

        $this->assertSame('Sixpack, Joe Fred', $column->generate($individual, $individual));
    }

    /**
     * @covers \Fisharebest\Webtrees\Census\CensusColumnSurnameGivenNames
     * @covers \Fisharebest\Webtrees\Census\AbstractCensusColumn
     *
     * @return void
     */
    public function testNoName()
    {
        $individual = Mockery::mock('Fisharebest\Webtrees\Individual');
        $individual->shouldReceive('getAllNames')->andReturn([]);
        $individual->shouldReceive('getSpouseFamilies')->andReturn([]);

        $census = Mockery::mock('Fisharebest\Webtrees\Census\CensusInterface');
        $census->shouldReceive('censusDate')->andReturn('');

        $column = new CensusColumnSurnameGivenNames($census, '', '');

        $this->assertSame('', $column->generate($individual, $individual));
    }
}
