<?php
namespace TYPO3\Neos\Tests\Functional\TypoScript;

	/*                                                                        *
	 * This script belongs to the TYPO3 Flow package "TYPO3.Neos".            *
	 *                                                                        *
	 * It is free software; you can redistribute it and/or modify it under    *
	 * the terms of the GNU General Public License, either version 3 of the   *
	 * License, or (at your option) any later version.                        *
	 *                                                                        *
	 * The TYPO3 project - inspiring people to share!                         *
	 *                                                                        */
use TYPO3\Eel\FlowQuery\FlowQuery;

/**
 * Functional test case which tests FlowQuery
 */
class FlowQueryTest extends AbstractNodeTest {

	/**
	 * @test
	 */
	public function parentsFollowedByFirstMatchesInnermostNodeOnRootline() {
		$teaserText = $this->node->getNode('teaser/dummy42');

		$q = new FlowQuery(array($teaserText));
		$actual = iterator_to_array($q->parents('[someSpecialProperty]')->first());
		$expected = array($this->node->getNode('teaser'));

		$this->assertTrue($expected === $actual);
	}
}
?>