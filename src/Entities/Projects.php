<?php
namespace LunixLabs\Entities;
/** @Entity
 * @Table(name="projects")
 */
class Projects
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="string") */
    private $name;

    public function toArray(){
        return ['id' => $this->id, "name" => $this->name];
    }
}
