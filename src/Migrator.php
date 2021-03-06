<?php
namespace SanctionsList;

// DEPRECATED CLASS - WILL USE ATK4\SCHEMA\MIGRATION\PGSQL INSTEAD !!!

class Migrator extends \atk4\schema\Migration
{
    /** @var string Expression to create primary key */
    public $primary_key_expr = 'bigint generated by default as identity(start with 1) primary key';

    /**
     * Return database table descriptions.
     * DB engine specific.
     *
     * @param string $table
     *
     * @return array
     */
    public function describeTable($table)
    {
        $columns = $this->connection->expr('SELECT * FROM information_schema.COLUMNS WHERE TABLE_NAME = []', [$table])->get();

        if (!$columns) {
            return []; // no such table
        }

        $result = [];

        foreach ($columns as $row) {
            $row2 = [];
            $row2['name'] = $row['column_name'];
            $row2['pk'] = $row['is_identity'] == 'YES';
            $row2['type'] = preg_replace('/\(.*/', '', $row['udt_name']); // $row['data_type'], but it's PgSQL specific type

            $result[] = $row2;
        }

        return $result;
    }
}
