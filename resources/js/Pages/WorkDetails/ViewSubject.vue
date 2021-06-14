<template>
    <div>
        <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Academic Year: </span>
            <span class="text-gray-700">
            {{ myWork.academic_year ? myWork.academic_year : 'Not Availlable'  }}
            </span>
        </div>

        <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Level: </span>
            <span class="text-gray-700">
            {{ myWork.level.title ? myWork.level.title : 'Not Availlable'  }}
            </span>
        </div>

        <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Field: </span>
            <span class="text-gray-700">
            {{ myWork.field.title ? myWork.field.title+'('+myWork.field.abbr+')' : 'Not Availlable'  }}
            </span>
        </div>
        
         <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Period: </span>
            <span class="text-gray-700">
            {{ myWork.period.title ? myWork.period.title+'('+myWork.period.abbr+')' : 'Not Availlable'  }}
            </span>
        </div>

        <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Number of Pages : </span>
            <span class="text-gray-700">
            {{ myWork.number_of_pages ? myWork.number_of_pages : 'Not Availlable'  }}
            </span>
        </div>
        <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Language: </span>
            <span class="text-gray-700">
            {{ myWork.language ? myWork.language : 'Not Availlable'  }}
            </span>
        </div>

        <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Description: </span>
            <span class="text-gray-700">
            {{ myW<template>
    <div>
        <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Academic Year: </span>
            <span class="text-gray-700">
            {{ myWork.academic_year ? myWork.academic_year : 'Not Availlable'  }}
            </span>
        </div>

        <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Level: </span>
            <span class="text-gray-700">
            {{ myWork.level.title ? myWork.level.title : 'Not Availlable'  }}
            </span>
        </div>

        <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Field: </span>
            <span class="text-gray-700">
            {{ myWork.field.title ? myWork.field.title+'('+myWork.field.abbr+')' : 'Not Availlable'  }}
            </span>
        </div>
        
         <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Period: </span>
            <span class="text-gray-700">
            {{ myWork.period.title ? myWork.period.title+'('+myWork.period.abbr+')' : 'Not Availlable'  }}
            </span>
        </div>

        <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Number of Pages : </span>
            <span class="text-gray-700">
            {{ myWork.number_of_pages ? myWork.number_of_pages : 'Not Availlable'  }}
            </span>
        </div>
        <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Language: </span>
            <span class="text-gray-700">
            {{ myWork.language ? myWork.language : 'Not Availlable'  }}
            </span>
        </div>

        <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Description: </span>
            <span class="text-gray-700">
            {{ myWork.description ? myWork.description : 'Not Availlable'  }}
            </span>
        </div>
    </div>
</template>

<script>
export default {
    props : {
        work : Object
    },
    data() {
        return {
            myWork : this.work
        }
    },
}
</script>