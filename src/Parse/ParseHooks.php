<?php
/**
 * Class ParseHooks | Parse/ParseHooks.php
 */

namespace Parse;

/**
 * Class ParseHooks - Representation of a Parse Hooks object.
 *
 * @author Phelipe Alves <phelipealvessouza@gmail.com>
 * @package Parse
 */
class ParseHooks
{
    /**
     * Fetch the list of all cloud functions.
     *
     * @return array
     * @throws ParseException
     *
     */
    public function fetchFunctions()
    {
        $result = ParseClient::_request(
            'GET',
            'hooks/functions',
            null,
            null,
            true
        );

        return $result;
    }

    /**
     * Fetch a single cloud function with a given name.
     *
     * @param string $functionName
     *
     * @return array
     * @throws ParseException
     *
     */
    public function fetchFunction($functionName)
    {
        $result = ParseClient::_request(
            'GET',
            'hooks/functions/' . $functionName,
            null,
            null,
            true
        );

        return $result;
    }

    /**
     * Fetch the list of all cloud triggers.
     *
     * @return array
     * @throws ParseException
     *
     */
    public function fetchTriggers()
    {
        $result = ParseClient::_request(
            'GET',
            'hooks/triggers',
            null,
            null,
            true
        );

        return $result;
    }

    /**
     * Fetch a single cloud trigger.
     *
     * @param string $className
     * @param string $triggerName
     *
     * @return array
     * @throws ParseException
     *
     */
    public function fetchTrigger($className, $triggerName)
    {
        $result = ParseClient::_request(
            'GET',
            'hooks/triggers/' . $className . '/' . $triggerName,
            null,
            null,
            true
        );

        return $result;
    }

    /**
     * Create a new function webhook.
     *
     * @param string $functionName
     * @param string $url
     *
     * @return array
     * @throws ParseException
     *
     */
    public function createFunction($functionName, $url)
    {
        $result = ParseClient::_request(
            'POST',
            'hooks/functions',
            null,
            json_encode([
                'functionName' => $functionName,
                'url' => $url,
            ]),
            true
        );

        return $result;
    }

    /**
     * Create a new trigger webhook.
     *
     * @param string $className
     * @param string $triggerName
     * @param string $url
     *
     * @return array
     */
    public function createTrigger($className, $triggerName, $url)
    {
        $result = ParseClient::_request(
            'POST',
            'hooks/triggers',
            null,
            json_encode([
                'className' => $className,
                'triggerName' => $triggerName,
                'url' => $url,
            ]),
            true
        );

        return $result;
    }

    /**
     * Edit the url of a function webhook that was already created.
     *
     * @param string $functionName
     * @param string $url
     *
     * @return array
     * @throws ParseException
     *
     */
    public function editFunction($functionName, $url)
    {
        $result = ParseClient::_request(
            'PUT',
            'hooks/functions/' . $functionName,
            null,
            json_encode([
                'url' => $url,
            ]),
            true
        );

        return $result;
    }

    /**
     * Edit the url of a trigger webhook that was already crated.
     *
     * @param string $className
     * @param string $triggerName
     * @param string $url
     *
     * @return array
     */
    public function editTrigger($className, $triggerName, $url)
    {
        $result = ParseClient::_request(
            'PUT',
            'hooks/triggers/' . $className . '/' . $triggerName,
            null,
            json_encode([
                'url' => $url,
            ]),
            true
        );

        return $result;
    }

    /**
     * Delete a function webhook.
     *
     * @param string $functionName
     *
     * @return array
     * @throws ParseException
     *
     */
    public function deleteFunction($functionName)
    {
        $result = ParseClient::_request(
            'PUT',
            'hooks/functions/' . $functionName,
            null,
            json_encode([
                '__op' => 'Delete',
            ]),
            true
        );

        return $result;
    }

    /**
     * Delete a trigger webhook.
     *
     * @param string $className
     * @param string $triggerName
     *
     * @return array
     */
    public function deleteTrigger($className, $triggerName)
    {
        $result = ParseClient::_request(
            'PUT',
            'hooks/triggers/' . $className . '/' . $triggerName,
            null,
            json_encode([
                '__op' => 'Delete',
            ]),
            true
        );

        return $result;
    }
}
