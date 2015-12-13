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

    /** @Column(type="string") */
    private $url;

    /** @Column(type="string", name="short_description") */
    private $shortDescription;

    /** @Column(type="string") */
    private $description;

    public function toArray(){
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
            "short_description" => $this->shortDescription,
            "description" => $this->description
        ];
    }
}
