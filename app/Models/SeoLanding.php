<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id,
 * @property int admin_id,
 * @property string product,
 * @property int origin_id,
 * @property int destination_id,
 * @property string seo_h1,
 * @property string seo_title,
 * @property string seo_desc,
 * @property string|null content,
 * @property int status,
 * @property \DateTime created_at,
 * @property \DateTime updated_at,
 * @property \DateTime|null deleted_at,
 *
 * */
class SeoLanding extends Model
{
    protected $table = 'seo_landings';

    public function getId(): int
    {
        return $this->id;
    }

    public function getAdminId(): int
    {
        return $this->admin_id;
    }

    public function setAdminId(int $admin_id): void
    {
        $this->admin_id = $admin_id;
    }

    public function getProduct(): string
    {
        return $this->product;
    }

    public function setProduct(string $product): void
    {
        $this->product = $product;
    }

    public function getOriginId(): int
    {
        return $this->origin_id;
    }

    public function setOriginId(int $origin_id): void
    {
        $this->origin_id = $origin_id;
    }

    public function getDestinationId(): int
    {
        return $this->destination_id;
    }

    public function setDestinationId(int $destination_id): void
    {
        $this->destination_id = $destination_id;
    }

    public function getSeoH1(): string
    {
        return $this->seo_h1;
    }

    public function setSeoH1(string $seo_h1): void
    {
        $this->seo_h1 = $seo_h1;
    }

    public function getSeoTitle(): string
    {
        return $this->seo_title;
    }

    public function setSeoTitle(string $seo_title)
    {
        $this->seo_title = $seo_title;

        return $this;
    }

    public function getSeoDesc(): string
    {
        return $this->seo_desc;
    }

    public function setSeoDesc(string $seo_desc): void
    {
        $this->seo_desc = $seo_desc;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    public function getDeletedAt(): ?\DateTime
    {
        return $this->deleted_at;
    }
}
