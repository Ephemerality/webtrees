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

/**
 * Test harness for the class CensusOfScotland1871
 */
class CensusOfScotland1871Test extends \Fisharebest\Webtrees\TestCase
{
    /**
     * Test the census place and date
     *
     * @covers \Fisharebest\Webtrees\Census\CensusOfScotland1871
     */
    public function testPlaceAndDate()
    {
        $census = new CensusOfScotland1871;

        $this->assertSame('Scotland', $census->censusPlace());
        $this->assertSame('02 APR 1871', $census->censusDate());
    }

    /**
     * Test the census columns
     *
     * @covers \Fisharebest\Webtrees\Census\CensusOfScotland1871
     * @covers \Fisharebest\Webtrees\Census\AbstractCensusColumn
     */
    public function testColumns()
    {
        $census  = new CensusOfScotland1871;
        $columns = $census->columns();

        $this->assertCount(9, $columns);
        $this->assertInstanceOf('Fisharebest\Webtrees\Census\CensusColumnFullName', $columns[0]);
        $this->assertInstanceOf('Fisharebest\Webtrees\Census\CensusColumnRelationToHead', $columns[1]);
        $this->assertInstanceOf('Fisharebest\Webtrees\Census\CensusColumnConditionEnglish', $columns[2]);
        $this->assertInstanceOf('Fisharebest\Webtrees\Census\CensusColumnAgeMale', $columns[3]);
        $this->assertInstanceOf('Fisharebest\Webtrees\Census\CensusColumnAgeFemale', $columns[4]);
        $this->assertInstanceOf('Fisharebest\Webtrees\Census\CensusColumnOccupation', $columns[5]);
        $this->assertInstanceOf('Fisharebest\Webtrees\Census\CensusColumnBirthPlace', $columns[6]);
        $this->assertInstanceOf('Fisharebest\Webtrees\Census\CensusColumnNull', $columns[7]);
        $this->assertInstanceOf('Fisharebest\Webtrees\Census\CensusColumnNull', $columns[8]);

        $this->assertSame('Name', $columns[0]->abbreviation());
        $this->assertSame('Relation', $columns[1]->abbreviation());
        $this->assertSame('Condition', $columns[2]->abbreviation());
        $this->assertSame('AgeM', $columns[3]->abbreviation());
        $this->assertSame('AgeF', $columns[4]->abbreviation());
        $this->assertSame('Occupation', $columns[5]->abbreviation());
        $this->assertSame('Birthplace', $columns[6]->abbreviation());
        $this->assertSame('Infirm', $columns[7]->abbreviation());
        $this->assertSame('School', $columns[8]->abbreviation());

        $this->assertSame('Name and surname', $columns[0]->title());
        $this->assertSame('Relation to head of household', $columns[1]->title());
        $this->assertSame('Condition', $columns[2]->title());
        $this->assertSame('Age (males)', $columns[3]->title());
        $this->assertSame('Age (females)', $columns[4]->title());
        $this->assertSame('Rank, profession or occupation', $columns[5]->title());
        $this->assertSame('Where born', $columns[6]->title());
        $this->assertSame('Whether deaf-and-dumb, blind, imbecile, idiot or lunatic', $columns[7]->title());
        $this->assertSame('Number of children between 5 and 13 attending school or educated at home', $columns[8]->title());
    }
}
