<?php

/**
 * @file FontSizeBlockPlugin.inc.php
 *
 * Copyright (c) 2003-2010 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class FontSizeBlockPlugin
 * @ingroup plugins_blocks_fontSize
 *
 * @brief Class for font size block plugin
 *
 */

// $Id$

import('plugins.BlockPlugin');

class FontSizeBlockPlugin extends BlockPlugin {
	function register($category, $path) {
		$success = parent::register($category, $path);
		if ($success) {
			$templateMgr =& TemplateManager::getManager();
			$templateMgr->assign('baseUrl', Request::getBasePath() . '/');
			$additionalHeadData = $templateMgr->get_template_vars('additionalHeadData');
		}
		return $success;
	}

	/**
	 * Determine whether the plugin is enabled. Overrides parent so that
	 * the plugin will be displayed during install.
	 */
	function getEnabled() {
		if (!Config::getVar('general', 'installed')) return true;
		return parent::getEnabled();
	}

	/**
	 * Install default settings on system install.
	 * @return string
	 */
	function getInstallSitePluginSettingsFile() {
		return $this->getPluginPath() . '/settings.xml';
	}

	/**
	 * Install default settings on journal creation.
	 * @return string
	 */
	function getContextSpecificPluginSettingsFile() {
		return $this->getPluginPath() . '/settings.xml';
	}

	/**
	 * Get the block context. Overrides parent so that the plugin will be
	 * displayed during install.
	 * @return int
	 */
	function getBlockContext() {
		if (!Config::getVar('general', 'installed')) return BLOCK_CONTEXT_RIGHT_SIDEBAR;
		return parent::getBlockContext();
	}

	/**
	 * Determine the plugin sequence. Overrides parent so that
	 * the plugin will be displayed during install.
	 */
	function getSeq() {
		if (!Config::getVar('general', 'installed')) return 3;
		return parent::getSeq();
	}

	/**
	 * Get the display name of this plugin.
	 * @return String
	 */
	function getDisplayName() {
		return Locale::translate('plugins.block.fontSize.displayName');
	}

	/**
	 * Get a description of the plugin.
	 */
	function getDescription() {
		return Locale::translate('plugins.block.fontSize.description');
	}

	/**
	 * Get the HTML contents for this block.
	 * @param $templateMgr object
	 * @return string
	 */
	function getContents(&$templateMgr) {
		return parent::getContents($templateMgr);
	}
}

?>
