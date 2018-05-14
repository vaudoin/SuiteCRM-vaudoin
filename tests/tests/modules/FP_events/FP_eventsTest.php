<?PHP

class FP_eventsTest extends SuiteCRM\StateCheckerPHPUnitTestCaseAbstract
{
    public function testFP_events()
    {
        // save state
        
        $state = new SuiteCRM\StateSaver();
        $state->pushTable('emails');
        $state->pushGlobals();
        
        // test

        //execute the contructor and check for the Object type and  attributes
        $fpEvents = new FP_events();
        $this->assertInstanceOf('FP_events', $fpEvents);
        $this->assertInstanceOf('Basic', $fpEvents);
        $this->assertInstanceOf('SugarBean', $fpEvents);

        $this->assertAttributeEquals('FP_events', 'module_dir', $fpEvents);
        $this->assertAttributeEquals('FP_events', 'object_name', $fpEvents);
        $this->assertAttributeEquals('fp_events', 'table_name', $fpEvents);
        $this->assertAttributeEquals(true, 'new_schema', $fpEvents);
        $this->assertAttributeEquals(true, 'importable', $fpEvents);
        $this->assertAttributeEquals(true, 'disable_row_level_security', $fpEvents);
        
        // clean up
        
        $state->popTable('emails');
        $state->popGlobals();
    }

    public function testemail_templates()
    {
        $this->markTestIncomplete('Incorrect state hash (in PHPUnitTest): Hash doesn\'t match at key "database::emails".');
        
        // save state
        
        $state = new SuiteCRM\StateSaver();
        $state->pushTable('emails');
        $state->pushGlobals();
        
        // test

        global $app_list_strings;

        $fpEvents = new FP_events();

        $fpEvents->email_templates();
        $this->assertTrue(is_array($app_list_strings['email_templet_list']));
        
        // clean up
        
        $state->popTable('emails');
        $state->popGlobals();
    }
}
