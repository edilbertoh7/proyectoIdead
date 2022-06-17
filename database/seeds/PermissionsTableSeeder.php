<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /**USERS*/
        DB::table('permissions')->insert([
            'name'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios',
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de usuario',
            'slug'          => 'users.show',
            'description'   => 'Ver en detalle cada usuario usuario',            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Creación de usuarios',
            'slug'          => 'users.create',
            'description'   => 'Crear nuevos usuarios',
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Edición de usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Editar los datos de cualquier usuario',
        ]);        
        
        /**ROLES*/
        DB::table('permissions')->insert([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles',
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de un rol',
            'slug'          => 'roles.show',
            'description'   => 'Ver en detalle cada rol',            
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Creación de roles',
            'slug'          => 'roles.create',
            'description'   => 'crear nuevos roles',
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Editar cualquier dato de un rol',
        ]);

        /**CAT*/
        DB::table('permissions')->insert([
            'name'          => 'Navegar CAT',
            'slug'          => 'cats.index',
            'description'   => 'Lista y navega todos los CAT',
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de un CAT',
            'slug'          => 'cats.show',
            'description'   => 'Ve en detalle cada CAT',            
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Creación de CAT',
            'slug'          => 'cats.create',
            'description'   => 'Crear nuevos CAT en el sistema',
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Edición de CAT',
            'slug'          => 'cats.edit',
            'description'   => 'Editar cualquier dato de un CAT',
        ]);


        /**PROGRAMAS*/
        DB::table('permissions')->insert([
            'name'          => 'Navegar programas',
            'slug'          => 'programas.index',
            'description'   => 'Lista y navega todos los programas',
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de un programa',
            'slug'          => 'programas.show',
            'description'   => 'Ve en detalle cada programa',            
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Creación de programas',
            'slug'          => 'programas.create',
            'description'   => 'Crear nuevos programas en el sistema',
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Edición de programas',
            'slug'          => 'programas.edit',
            'description'   => 'Editar cualquier dato de un programa',
        ]);


        /**CURSOS*/
        DB::table('permissions')->insert([
            'name'          => 'Navegar cursos',
            'slug'          => 'cursos.index',
            'description'   => 'Lista y navega todos los cursos',
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de un curso',
            'slug'          => 'cursos.show',
            'description'   => 'Ve en detalle cada curso',            
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Creación de cursos',
            'slug'          => 'cursos.create',
            'description'   => 'Crear nuevos cursos en el sistema',
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Edición de cursos',
            'slug'          => 'cursos.edit',
            'description'   => 'Editar cualquier dato de un curso',
        ]);
        
        /**CONVOCATORIAS*/
        DB::table('permissions')->insert([
            'name'          => 'Navegar convocatorias',
            'slug'          => 'convocatorias.index',
            'description'   => 'Lista y navega todas los convocatorias',
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de una convocatoria',
            'slug'          => 'convocatorias.show',
            'description'   => 'Ver en detalle cada convocatoria',            
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Creación de convocatorias',
            'slug'          => 'convocatorias.create',
            'description'   => 'Crear nuevas convocatorias en el sistema',
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Edición de convocatorias',
            'slug'          => 'convocatorias.edit',
            'description'   => 'Editar cualquier dato de una convocatoria',
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Ver aspirantes de convocatorias',
            'slug'          => 'convocatorias.show.aspirantes',
            'description'   => 'Ver todos los aspirantes a la convocatoria',      
        ]);

        /**DETALLE DE CONVOCATORIAS*/
        DB::table('permissions')->insert([
            'name'          => 'Navegar detalle de convocatorias',
            'slug'          => 'detalleConvocatorias.index',
            'description'   => 'Lista y navega todos los detalles convocatorias',
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver de forma individual cada uno de los detalles de una convocatoria',
            'slug'          => 'detalleConvocatorias.show',
            'description'   => 'Ve el detalle de forma individual de una convocatoria',            
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Creación de detalles convocatorias',
            'slug'          => 'detalleConvocatorias.create',
            'description'   => 'crear un detalle de convocatorias en el sistema',
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Edición del detalle de una convocatoria',
            'slug'          => 'detalleConvocatorias.edit',
            'description'   => 'Editar cualquier dato del detalle de una convocatoria',
        ]);

        /**APLICANTES CONVOCATORIA*/
        DB::table('permissions')->insert([
            'name'          => 'Creación de aplicantesConvocatoria',
            'slug'          => 'aplicantesConvocatorias.create',
            'description'   => 'Aplicar a convocatorias',
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Ver hojas de vida de aspirantes',
            'slug'          => 'aplicantesConvocatorias.show.hv',
            'description'   => 'Visualizar las hojas de vida de los aspirantes',      
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Pre-seleccion de aspirantes',
            'slug'          => 'aplicantesConvocatorias.edit.preselected',
            'description'   => 'Realizar la preseleccion de los aspirantes (Permite la evalucion de las hojas de vida)',
        ]);

        /**EVALUACIONES DE PRE-SELECCIONADOS*/
        DB::table('permissions')->insert([
            'name'          => 'Navegar evaluaciones',
            'slug'          => 'evaluacionesAspirantes.index',
            'description'   => 'Lista y navega todos los pre-seleccionados',
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de una evaluacion',
            'slug'          => 'evaluacionesAspirantes.show',
            'description'   => 'Ve en detalle cada pre-seleccionado',            
        ]);
        
        DB::table('permissions')->insert([
            'name'          => 'Edición de evaluaciones',
            'slug'          => 'evaluacionesAspirantes.edit',
            'description'   => 'Editar cualquier dato de un pre-seleccionado',
        ]);

        /**REPORTES*/
        DB::table('permissions')->insert([
            'name'          => 'Reportes de convocatorias',
            'slug'          => 'convocatorias.report',
            'description'   => 'Generar reportes de una convocatoria',
        ]);

        /**REPORTES*/
        DB::table('permissions')->insert([
            'name'          => 'Log de auditoria',
            'slug'          => 'audits.index',
            'description'   => 'Puede ver el log de auditoria del sistema',
        ]);
    }
}
