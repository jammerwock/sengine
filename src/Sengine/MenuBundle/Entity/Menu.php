<?php
namespace Sengine\MenuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="menu")
 * @ORM\Entity(repositoryClass="Sengine\MenuBundle\Entity\MenuRepository")
 */
class Menu{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $title;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $route;

	/**
	 * @ORM\Column(type="string", nullable=true)
	 */
	protected $alias;

	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $static;

	/**
	 * @ORM\ManyToOne(targetEntity="Sengine\MenuBundle\Entity\MenuType", inversedBy="menuTypeId")
	 * @ORM\JoinColumn(name="menuTypeId", referencedColumnName="id")
	 */
	protected $menuTypeId;

########################################################################################################################

	/**
	 * @ORM\ManyToOne(targetEntity="Menu", inversedBy="children")
	 * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
	 */
	private $parent;

	/**
	 * @ORM\OneToMany(targetEntity="Menu", mappedBy="parent")
	 */
	private $children;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->children = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Set parent
	 *
	 * @param \Sengine\MenuBundle\Entity\Menu $parent
	 * @return Menu
	 */
	public function setParent(\Sengine\MenuBundle\Entity\Menu $parent = null)
	{
		$this->parent = $parent;

		return $this;
	}

	/**
	 * Get parent
	 *
	 * @return \Sengine\MenuBundle\Entity\Menu
	 */
	public function getParent()
	{
		return $this->parent;
	}

	/**
	 * Add children
	 *
	 * @param \Sengine\MenuBundle\Entity\Menu $children
	 * @return Menu
	 */
	public function addChildren(\Sengine\MenuBundle\Entity\Menu $children)
	{
		$this->children[] = $children;

		return $this;
	}

	/**
	 * Remove children
	 *
	 * @param \Sengine\MenuBundle\Entity\Menu $children
	 */
	public function removeChildren(\Sengine\MenuBundle\Entity\Menu $children)
	{
		$this->children->removeElement($children);
	}

	/**
	 * Get children
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getChildren()
	{
		return $this->children;
	}



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Menu
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set route
     *
     * @param string $route
     * @return Menu
     */
    public function setRoute($route)
    {
        $this->route = $route;
    
        return $this;
    }

    /**
     * Get route
     *
     * @return string 
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Menu
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    
        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set static
     *
     * @param boolean $static
     * @return Menu
     */
    public function setStatic($static)
    {
        $this->static = $static;
    
        return $this;
    }

    /**
     * Get static
     *
     * @return boolean 
     */
    public function getStatic()
    {
        return $this->static;
    }

    /**
     * Set menuTypeId
     *
     * @param \Sengine\MenuBundle\Entity\MenuType $menuTypeId
     * @return Menu
     */
    public function setMenuTypeId(\Sengine\MenuBundle\Entity\MenuType $menuTypeId = null)
    {
        $this->menuTypeId = $menuTypeId;
    
        return $this;
    }

    /**
     * Get menuTypeId
     *
     * @return \Sengine\MenuBundle\Entity\MenuType
     */
    public function getMenuTypeId()
    {
        return $this->menuTypeId;
    }
}