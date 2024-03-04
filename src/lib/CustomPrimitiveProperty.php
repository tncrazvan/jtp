<?php
namespace App;

readonly class CustomPrimitiveProperty {
    /**
     * 
     * @param  string $type Type of the property.
     * @param  string $name Name of the property.
     * @return CustomPrimitiveProperty 
     */
    public static function create(
        string $type,
        string $name,
    ):self {
        return new self(
            type:$type,
            name:$name,
        );
    }
    private function __construct(
        public string $type,
        public string $name,
    ) {
    }

    public function toStringForAnnotation() {
        return <<<PHP
             * @var {$this->type} \${$this->name}
            PHP;
    }

    public function toStringForCreate(): string {
        return <<<PHP
            {$this->type} \${$this->name},
            PHP;
    }

    public function toStringForConstructor(): string {
        return <<<PHP
            public {$this->type} \${$this->name},
            PHP;
    }
}