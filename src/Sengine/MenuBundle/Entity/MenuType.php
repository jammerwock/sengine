<?php
namespace Sengine\MenuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="menu_type")
 * @ORM\Entity(repositoryClass="Sengine\MenuBundle\Entity\MenuTypeRepository")
 */
class MenuType {

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
	 * @ORM\OneToMany(targetEntity="Menu", mappedBy="menuTypeId")
	 */
	private $typeId;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->typeId = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return MenuType
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
     * Add typeId
     *
     * @param \Sengine\MenuBundle\Entity\Menu $typeId
     * @return MenuType
     */
    public function addTypeId(\Sengine\MenuBundle\Entity\Menu $typeId)
    {
        $this->typeId[] = $typeId;
    
        return $this;
    }

    /**
     * Remove typeId
     *
     * @param \Sengine\MenuBundle\Entity\Menu $typeId
     */
    public function removeTypeId(\Sengine\MenuBundle\Entity\Menu $typeId)
    {
        $this->typeId->removeElement($typeId);
    }

    /**
     * Get typeId
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

	public function __toString()
	{
		return $this->title;
	}
}