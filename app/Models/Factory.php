<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\Factory
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Collection|Factory[] findBy(array $value)
 * @method static Collection|Factory[] findByCreatedAt($value)
 * @method static Collection|Factory[] findByName($value)
 * @method static Collection|Factory[] findByUpdatedAt($value)
 * @method static Factory findOneBy(array $value)
 * @method static Factory findOneByCreatedAt($value)
 * @method static Factory findOneById($value)
 * @method static Factory findOneByName($value)
 * @method static Factory findOneByUpdatedAt($value)
 * @method Carbon getCreatedAt()
 * @method integer getId()
 * @method string getName()
 * @method Carbon getUpdatedAt()
 * @method Factory setCreatedAt($value)
 * @method Factory setId($value)
 * @method Factory setName($value)
 * @method Factory setUpdatedAt($value)
 * @mixin \Eloquent
 */
class Factory extends CustomModel
{
    protected $table = 'factory';

    /**
     * @param User $user
     * @return float|int
     */
    public function getFactoryPrice(User $user)
    {
        if (null !== $userFactory = UserFactory::findOneBy(['user_id' => $user->getId(), 'factory_id' => $this->getId()])) {
            return 20000 * ($userFactory->getLevel() * 2.5);
        }else {
            return 20000;
        }
    }
}
