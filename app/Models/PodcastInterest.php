<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PodcastInterest extends Model
{
    use HasFactory;

    protected $fillable = [
        'pi_ownerid',
        'pi_podcastid',
        'pi_interestid',
        'pi_type',
        'pi_typestatus',
    ];

}
