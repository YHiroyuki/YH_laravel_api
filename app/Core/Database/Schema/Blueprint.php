<?php

namespace App\Core\Database\Schema;


use Illuminate\Database\Schema\Blueprint as FWBlueprint;

class Blueprint extends FwBlueprint
{
    /**
     * Add automatic creation and update timestamps to the table.
     *
     * @param  int  $precision
     */
    public function timestamps($precision = 0): void
    {
        $this->timestamp('created_at')->useCurrent();
        $this->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
    }
}

