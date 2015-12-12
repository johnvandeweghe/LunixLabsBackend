<?php
/** @Entity */
class Projects
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="string") */
    private $name;
}
