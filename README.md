# pagerduty-core
# php-immutable-collections
[![Build Status](https://travis-ci.org/shrikeh-pagerduty/pagerduty-core.svg)](https://travis-ci.org/shrikeh-pagerduty/pagerduty-core)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/shrikeh-pagerduty/pagerduty-core.svg)](https://scrutinizer-ci.com/g/shrikeh-pagerduty/pagerduty-core/?branch=master)
[![LibrariesIO Dependencies](https://img.shields.io/librariesio/github/shrikeh-pagerduty/pagerduty-core.svg)](https://libraries.io/github/shrikeh/pagerduty-core)
[![Latest Stable Version](https://poser.pugx.org/shrikeh/pagerduty-core/v/stable)](https://packagist.org/packages/shrikeh/pagerduty-core)
[![Latest Unstable Version](https://poser.pugx.org/shrikeh/pagerduty-core/v/unstable)](https://packagist.org/packages/shrikeh/pagerduty-core)
[![License](https://poser.pugx.org/shrikeh/pagerduty-core/license)](https://packagist.org/packages/shrikeh/pagerduty-core)
[![@shrikeh on Twitter](https://img.shields.io/badge/twitter-%40shrikeh-blue.svg)](https://twitter.com/shrikeh)


Core domain layer for interacting with the PagerDuty v2 API in PHP. Returns immutable collections of entities representing the data retrieved.
Uses Guzzle to contact the API.

For ease of use, you should consider pagerduty-pimple which has service providers for use with Pimple of Silex.
