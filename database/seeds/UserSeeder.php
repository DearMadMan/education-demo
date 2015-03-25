<?php

    use Illuminate\Database\Seeder;
    use Illuminate\Database\Eloquent\Model;

    class UserSeeder extends Seeder
    {

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run ()
        {
            /*管理员*/
            DB::table ('users')->insert (
                [
                    'name'       => 'wang' ,
                    'qq'         => '2034906607' ,
                    'email'      => '2034906607@qq.com' ,
                    'password'   => Hash::make ('wang') ,
                    'repassword' => 'wang' ,
                    'is_admin'   => 1
                ]
            );
            /*会员类别*/

            DB::table ('user_types')->insert (
                [

                    ['type_name' => '普通用户'] ,
                    ['type_name' => '初级会员'] ,
                    ['type_name' => '高级会员'] ,


                ]
            );

            DB::table ('user_types')->insert (
                ['type_name' => '违规用户' , 'is_disabled' => 1]
            );


            /* 文章分类 */
            DB::table ('article_types')->insert ([
                ['type_name'=>'未分类','user_permissible'=>''],
                ['type_name'=>'内部公告','user_permissible'=>'2,3'],
                ['type_name'=>'初级专区','user_permissible'=>'2,3'],
                ['type_name'=>'高级专区','user_permissible'=>'3'],
            ]);


            DB::table('configs')->insert([
                'env'=>'admin',
                'value'=>''
            ]);

















        }




    }
