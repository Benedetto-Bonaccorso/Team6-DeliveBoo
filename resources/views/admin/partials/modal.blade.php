                            <!-- Modal trigger button -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_project_{{$project->slug_title}}">
                                Delete
                            </button>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="delete_project_{{$project->slug_title}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId_{{$project->slug_title}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId_{{$project->slug_title}}">Delete {{$project->title}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                            <form action="{{route('admin.projects.destroy', $project->slug_title)}}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <input class="btn btn-danger btn-sm" type="submit" value="Delete">

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>