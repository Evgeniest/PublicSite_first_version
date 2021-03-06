<?php
/**
 * PHPCompatibility_Sniffs_PHP_NewLanguageConstructsSniff.
 *
 * PHP version 5.5
 *
 * @category  PHP
 * @package   PHPCompatibility
 * @author    Wim Godden <wim.godden@cu.be>
 * @copyright 2013 Cu.be Solutions bvba
 */

/**
 * PHPCompatibility_Sniffs_PHP_NewLanguageConstructsSniff.
 *
 * @category  PHP
 * @package   PHPCompatibility
 * @author    Wim Godden <wim.godden@cu.be>
 * @version   1.0.0
 * @copyright 2013 Cu.be Solutions bvba
 */
class PHPCompatibility_Sniffs_PHP_NewLanguageConstructsSniff extends PHPCompatibility_AbstractNewFeatureSniff
{

    /**
     * A list of new language constructs, not present in older versions.
     *
     * The array lists : version number with false (not present) or true (present).
     * If's sufficient to list the first version where the keyword appears.
     *
     * @var array(string => array(string => int|string|null))
     */
    protected $newConstructs = array(
                                        'T_NS_SEPARATOR' => array(
                                            '5.2' => false,
                                            '5.3' => true,
                                            'description' => 'the \ operator (for namespaces)'
                                        ),
                                        'T_POW' => array(
                                            '5.5' => false,
                                            '5.6' => true,
                                            'description' => 'power operator (**)'
                                        ), // identified in PHPCS 1.5 as T_MULTIPLY + T_MULTIPLY
                                        'T_POW_EQUAL' => array(
                                            '5.5' => false,
                                            '5.6' => true,
                                            'description' => 'power assignment operator (**=)'
                                        ), // identified in PHPCS 1.5 as T_MULTIPLY + T_MUL_EQUAL
                                        'T_ELLIPSIS' => array(
                                            '5.5' => false,
                                            '5.6' => true,
                                            'description' => 'variadic functions using ...'
                                        ),
                                        'T_SPACESHIP' => array(
                                            '5.6' => false,
                                            '7.0' => true,
                                            'description' => 'spaceship operator (<=>)'
                                        ), // identified in PHPCS 1.5 as T_IS_SMALLER_OR_EQUAL + T_GREATER_THAN
                                        'T_COALESCE' => array(
                                            '5.6' => false,
                                            '7.0' => true,
                                            'description' => 'null coalescing operator (??)'
                                        ), // identified in PHPCS 1.5 as T_INLINE_THEN + T_INLINE_THEN
                                    );


    /**
     * A list of new language constructs which are not recognized in PHPCS 1.x.
     *
     * The array lists an alternative token to listen for.
     *
     * @var array(string => int)
     */
    protected $newConstructsPHPCSCompat = array(
                                        'T_POW'       => T_MULTIPLY,
                                        'T_POW_EQUAL' => T_MUL_EQUAL,
                                        'T_SPACESHIP' => T_GREATER_THAN,
                                        'T_COALESCE'  => T_INLINE_THEN,
                                    );

    /**
     * Translation table for PHPCS 1.x tokens.
     *
     * The 'before' index lists the token which would have to be directly before the
     * token found for it to be one of the new language constructs.
     * The 'real_token' index indicates which language construct was found in that case.
     *
     * {@internal 'before' was choosen rather than 'after' as that allowed for a 1-on-1
     * translation list with the current tokens.}}
     *
     * @var array(string => array(string => string))
     */
    protected $PHPCSCompatTranslate = array(
                                        'T_MULTIPLY' => array(
                                            'before' => 'T_MULTIPLY',
                                            'real_token' => 'T_POW',
                                        ),
                                        'T_MUL_EQUAL' => array(
                                            'before' => 'T_MULTIPLY',
                                            'real_token' => 'T_POW_EQUAL',
                                        ),
                                        'T_GREATER_THAN' => array(
                                            'before' => 'T_IS_SMALLER_OR_EQUAL',
                                            'real_token' => 'T_SPACESHIP',
                                        ),
                                        'T_INLINE_THEN' => array(
                                            'before' => 'T_INLINE_THEN',
                                            'real_token' => 'T_COALESCE',
                                        ),
                                    );

    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        $tokens = array();
        foreach ($this->newConstructs as $token => $versions) {
            if (defined($token)) {
                $tokens[] = constant($token);
            }
            else if(isset($this->newConstructsPHPCSCompat[$token])) {
                $tokens[] = $this->newConstructsPHPCSCompat[$token];
            }
        }
        return $tokens;
    }//end register()


    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token in
     *                                        the stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens    = $phpcsFile->getTokens();
        $tokenType = $tokens[$stackPtr]['type'];

        // Translate pre-PHPCS 2.0 tokens for new constructs to the actual construct.
        if (isset($this->newConstructs[$tokenType]) === false) {
            if (
                isset($this->PHPCSCompatTranslate[$tokenType])
                &&
                $tokens[$stackPtr - 1]['type'] === $this->PHPCSCompatTranslate[$tokenType]['before']
            ) {
                $tokenType = $this->PHPCSCompatTranslate[$tokenType]['real_token'];
            }
        }

        // If the translation did not yield one of the tokens we are looking for, bow out.
        if (isset($this->newConstructs[$tokenType]) === false) {
            return;
        }

        $itemInfo = array(
            'name'   => $tokenType,
        );
        $this->handleFeature($phpcsFile, $stackPtr, $itemInfo);

    }//end process()


    /**
     * Get the relevant sub-array for a specific item from a multi-dimensional array.
     *
     * @param array $itemInfo Base information about the item.
     *
     * @return array Version and other information about the item.
     */
    public function getItemArray(array $itemInfo)
    {
        return $this->newConstructs[$itemInfo['name']];
    }


    /**
     * Get an array of the non-PHP-version array keys used in a sub-array.
     *
     * @return array
     */
    protected function getNonVersionArrayKeys()
    {
        return array('description');
    }


    /**
     * Retrieve the relevant detail (version) information for use in an error message.
     *
     * @param array $itemArray Version and other information about the item.
     * @param array $itemInfo  Base information about the item.
     *
     * @return array
     */
    public function getErrorInfo(array $itemArray, array $itemInfo)
    {
        $errorInfo = parent::getErrorInfo($itemArray, $itemInfo);
        $errorInfo['description'] = $itemArray['description'];

        return $errorInfo;

    }


    /**
     * Allow for concrete child classes to filter the error data before it's passed to PHPCS.
     *
     * @param array $data      The error data array which was created.
     * @param array $itemInfo  Base information about the item this error message applied to.
     * @param array $errorInfo Detail information about an item this error message applied to.
     *
     * @return array
     */
    protected function filterErrorData(array $data, array $itemInfo, array $errorInfo)
    {
        $data[0] = $errorInfo['description'];
        return $data;
    }


}//end class
