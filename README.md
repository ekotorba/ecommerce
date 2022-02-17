


<h1 align="center">Sylius Task.<br> BitBag Academy</h1>



About
-----

<p align="center">Set up store and add to product entity
such a property as color (programmatically, of course, not clicking in the panel
administrator as an attribute) with constants as fields for red, blue,
green (select menu). The store admin should be able to choose
this color when creating or updating a product in the admin panel and
views in the product view on the store's website..</p>

ScreenShots
-----
<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img src="https://i.ibb.co/cDSJw06/2022-02-17-19h06-18.png" />
    </a>
</p>
<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img src="https://i.ibb.co/Bg5PHR1/2022-02-17-19h09-47.png" />
    </a>
</p>

Documentation
-------------

```bash
Database -> database/sylius_dev
```
Product Entity who cooperation with ProductColor

```bash
class Product extends BaseProduct
{
//Entity of color_id to BitBag Task
    /**
     * @var ColorInterface|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\ProductColor\Color", inversedBy="products")
     * @ORM\JoinColumn(name="color_id", referencedColumnName="id")
     */
    private $color;

    //Geters And Setters of Colors

    public function getColor(): ?ColorInterface
    {
        return $this->color;
    }

    public function setColor(ColorInterface $color): void
    {
        $this->color = $color;
    }
}
    //End Geters And Setters of color
```
The Entity of Product Color
```bash
/**
 * @ORM\Entity
 * @ORM\Table(name="product_color")
 */

class Color implements ColorInterface
{

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string|null
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Product\Product", mappedBy="color_id")
     */
    private $products;




    // Getters and setters for products
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    // Getters for products
    public function getProducts(): ?string
    {
        return $this->products;
    }
}
```
Interface Entity of Product Color
```bash
interface ColorInterface extends ResourceInterface
{

    public function getName(): ?string;

    public function setName(?string $name): void;

    public function getProducts(): ?string;
}
```

Preparing FormExtension which add to SyliusAdminBundle 
```bash
App/Form/Extension/ProductColorTypeExtension
```
```bash
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('color', EntityType::class, [
                'class' => Color::class,
                'choice_label'=> 'name',
                'label' => 'Select product color',
            ]);
    }
```
<b>ADMIN VIEW: </b>Entity view visible to Store Admin with a choice of color
```bash
Templates/Bundles/SyliusAdminBundle/Product/tab/_details.html.twig
```
```bash
 <!--Form of Product Color  -->
<div>
{{ form_row(form.color) }}
</div>
<!--end -->
```
<b>USER VIEW: </b>
```bash
Templates/Shop/productColor.html.twig
```
```bash
<div class="ui product-color" id="product-color">
    {% if product.color is null %}
        <span>Color not been set</span>
    {% else %}
        <span class="bordered">{{ product.color.name }} </span>
    {% endif %}
</div>

```
View arrangement in yaml
```bash
Config/packages/productcolor_grid.yaml
```
```bash
sylius_ui:
    events:
        sylius.shop.product.show.right_sidebar:
            blocks:
                product_color:
                    template: 'Shop/ProductColor.html.twig'
                    priority: 29
```



