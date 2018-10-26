<?php
/**
 * @see https://github.com/dotkernel/dot-user/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-user/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

namespace Dot\User\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Dot\Mapper\Entity\Entity;

/**
 * Class RoleEntity
 * @package Dot\User\Entity
 */
class RoleEntity extends Entity implements \JsonSerializable
{
    /** @Id
     * @Column(type="integer")
     * @GeneratedValue *
     */
    protected $id;

    /** @var string @Column(type="string") **/
    protected $name;

    /**
     * Many Groups have Many Users.
     * @ManyToMany(targetEntity="User", mappedBy="roles")
     * @JoinTable(name="user_roles",
     *            joinColumns={@JoinColumn(name="userId", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="roleId", referencedColumnName="id")}
     *   )
     */
    private $users;

    /**
     * @return mixed
     */
    public function getUsers() : array
    {
        return $this->users->toArray() ?? [];
    }

    public function __construct() {
        $this->users = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
