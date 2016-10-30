<?php

namespace PeacefulBit\Slate\Parser\Nodes;

use function Nerd\Common\Strings\indent;

class FunctionExpression extends LambdaExpression
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param string $id
     * @param array $params
     * @param Node $body
     */
    public function __construct(string $id, array $params, Node $body)
    {
        $this->id = $id;

        parent::__construct($params, $body);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $prefix = '(def ';

        $signature = array_merge([$this->getId()], $this->getParams());
        $signatureString = '(' . implode(' ', array_map('strval', $signature)) . ')';

        return $prefix . $signatureString .  ' ' . strval($this->getBody()) . ')';
    }
}
