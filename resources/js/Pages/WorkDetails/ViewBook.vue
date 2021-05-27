<template>
    <div>
        <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">ISBN: </span>
            <span class="text-gray-700">
            {{ myWork.ISBN ? myWork.ISBN : 'Not Availlable'  }}
            </span>
        </div>

        <div class="text-lg xl:text-xl mb-2">
            <span class="font-semibold">Publisher: </span>
            <span class="text-gray-700">
            {{ myWork.publisher.name ? myWork.publisher.nam : 'Not Availlable'  }}
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