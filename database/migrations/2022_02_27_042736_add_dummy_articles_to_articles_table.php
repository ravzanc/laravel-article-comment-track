<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('articles')->insert(
            $this->getDummyArticles()
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('articles')->truncate();;
    }

    private function getDummyArticles(): array
    {
        $now = Carbon::now();

        return [
            [
                'title' => 'First article',
                'author' => 'First author',
                'content' => <<<FIRST_CONTENT
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tristique, arcu sed
                faucibus convallis, quam lorem consectetur metus, eget vulputate lacus risus non lacus. Cras aliquam,
                lectus sit amet bibendum interdum, elit sem porttitor libero, et dictum tellus ante mollis elit.
                Nullam imperdiet, enim eu commodo dapibus, ante libero mattis lectus, vel placerat mauris enim a magna.
                Cras congue dapibus commodo. In vel sodales ex. Integer sit amet turpis vitae erat lacinia aliquam quis
                in dolor. Nunc venenatis egestas urna, quis aliquet elit vulputate ut. Phasellus eu sollicitudin est.
                Praesent sed vulputate urna, ac varius leo. Nunc quam dolor, finibus in finibus nec, volutpat eget ante.
                Donec viverra congue tortor eget posuere.
                FIRST_CONTENT,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Second article',
                'author' => 'Second author',
                'content' => <<<SECOND_CONTENT
                Donec a consectetur erat, sed posuere ex. Sed interdum orci eu felis porta cursus. Etiam posuere, ligula
                quis sagittis suscipit, orci libero laoreet risus, a fringilla libero nulla ac elit. Vivamus suscipit,
                elit tempus varius viverra, velit nisl accumsan lorem, sed porttitor metus mi quis leo. Quisque tempor
                efficitur congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras sed lorem sed enim
                lobortis vestibulum. Donec fermentum in turpis eget convallis.
                SECOND_CONTENT,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
    }
};
